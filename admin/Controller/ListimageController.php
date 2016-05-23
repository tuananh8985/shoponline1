<?php
App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');
/**
 * Description of CataloguesrecController
 * @author : Trung Tong
 * @since 12-10-2012
 */
class ListimageController extends AppController {

    public $name = 'Listimage';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }
/**
     * Danh sách sản phẩm
     * @author Trung Tong
     */

 public function index($id = null) {
        $Listimage = $this->Listimage->find('all', array(
            'conditions' => array(
                'Listimage.parent_id' => $id
            ),
            'order' => array('Listimage. pos ASC', 'Listimage.modified DESC')
            ));
        $this->set('Listimage', $Listimage);

        // List for combo box
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');

        // set ID
        $this->set('catId', $id);
        $this->set(compact('list_cat'));
    }
  
   /**
     * add catproducts
     * @author : Trung Tong
     * @param $id : id in table Danhmuc
     */
    function add($id = null) {
        if (!empty($this->request->data)) {
            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            if (!empty($_FILES['userfile']['name'])) {
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {

                    // Neu resize
//                $handle->image_resize          = true;
//                $handle->image_ratio_y        = true;
//                $handle->image_x                 = 790;

                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'listimage');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }

            $this->Listimage->create();
            $data = $this->request->data;
            $data['Listimage']['images'] = $img;
            $data['Listimage']['parent_id'] = $data['Listimage']['catId'];
            if ($this->Listimage->save($data['Listimage'])) {
                $this->redirect('/listimage/index/' . $data['Listimage']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Listimage->read(null, $id));
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl catproducts
     * @author : Trung Tong
     * @param $id : id in table Listimage
     */
    function edit($id = null) {
        $this->Listimage->setLanguage('vie', 'eng');
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'listimage');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $this->request->data['oldimg'];
            }

            $data = $this->request->data;
            $data['Listimage']['images'] = $img;
            if ($this->Listimage->save($data['Listimage'])) {
                $this->redirect('/listimage/index/');
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Listimage->read(null, $id);
        }
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit tieng viet
        $this->Listimage->setLanguage('vie');
        $edit_vie = $this->Listimage->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Listimage->setLanguage('eng');
        $edit_eng = $this->Listimage->findById($id);
        $this->set('edit_eng', $edit_eng);
    
	
        // Edit tieng trung
        $this->Listimage->setLanguage('chi');
        $edit_chi = $this->Listimage->findById($id);
        $this->set('edit_chi', $edit_chi);
	}

    /**
     * delete Listimage
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Listimage->delete($id)) {
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];
        // Update order
        foreach ($vitri as $k => $v) {
            $this->Listimage->updateAll(array('Listimage.pos' => $v), array('Listimage.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Listimage->id = $id;
        $this->Listimage->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Listimage->id = $id;
        $this->Listimage->saveField('status', 1);
        $this->redirect($this->referer());
    }
    
    
	  /**
     * Tim kiem bai viet
     */
   function search() {
        if ($this->request->is('post')) {
            // Lay du lieu tu form
            $listCat = $_REQUEST['listCat'];
            $this->Session->write('catId', $listCat);

            // Get keyword
            $keyword = $_REQUEST['keyword'];
            $this->Session->write('keyword', $keyword);
        } else {
            $listCat = $this->Session->read('catId');
            $keyword = $this->Session->read('keyword');
        }

        // setup condition to search
        $condition = array();
        if (!empty($keyword)) {
            $condition[] = array(
                'Listimage.name LIKE' => '%' . $keyword . '%'
            );
        }

        if ($listCat > 0) {
            $condition[] = array(
                'Listimage.parent_id' => $listCat
            );
        }

        // Lưu đường dẫn để quay lại nếu update, edit, dellete
        $urlTmp = DOMAINAD . $this->request->url;
        $this->Session->write('pagenew', $urlTmp);

        // Sau khi lay het dieu kien sap xep vao 1 array
        $conditions = array();
        foreach ($condition as $values) {
            foreach ($values as $key => $cond) {
                $conditions[$key] = $cond;
            }
        }

        // Tang so thu tu * limit (example : 10)
        $urlTmp = DOMAINAD . $this->request->url;
        $urlTmp = explode(":", $urlTmp);
        if (isset($urlTmp[2])) {
            $startPage = ($urlTmp[2] - 1) * 10 + 1;
        } else {
            $startPage = 1;
        }
        $this->set('startPage', $startPage);

        // Simple to call data
        $this->paginate = array(
            'conditions' => $condition,
            'order' => 'Listimage.id DESC',
            'limit' => '10'
        );
        $product = $this->paginate('Listimage');
        $this->set('product', $product);

        // Load model
        $this->loadModel("Catalogue");
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
    }


}