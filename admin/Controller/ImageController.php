<?php

App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of NewsController
 * @author : Trung Tong
 * @since 09-10-2012
 */
class ImageController extends AppController {

    public $name = 'Image';
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
    function index() {
        $this->paginate = array(
            'order' => 'Image.pos ASC, Image.modified DESC',
            'limit' => '10'
        );
        $listNews = $this->paginate('Image');
        $this->set('listNewss', $listNews);

        // Tang so thu tu * limit (example : 10)
        $urlTmp = DOMAINAD . $this->request->url;
        $urlTmp = explode(":", $urlTmp);
        if (isset($urlTmp[2])) {
            $startPage = ($urlTmp[2] - 1) * 10 + 1;
        } else {
            $startPage = 1;
        }
        $this->set('startPage', $startPage);
        
        // Lưu đường dẫn để quay lại nếu update, edit, dellete
        $urlnew = DOMAINAD . $this->request->url;
        $this->Session->write('urlnew', $urlnew);

        // Xoa session thang search
        $this->Session->delete('catId');
        $this->Session->delete('keyword');
        $this->Session->delete('pagenew');

        // Load model
        $this->loadModel("Listimage");
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];
        $sphome = $_REQUEST['sphome'];
        $sphot = $_REQUEST['sphot'];

        // Update order
        foreach ($vitri as $k => $v) {
			if($v == "") {
				$v = null;
			}
            $this->Image->updateAll(
                array(
                'Image.pos' => $v,
                'Image.new' => $sphome[$k],
                'Image.hot' => $sphot[$k]
                ), array(
                'Image.id' => $k)
            );
        }
        if ($this->Session->check('pagenew')) {
            $this->redirect($this->Session->read('pagenew'));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Xu ly cac chuc nang lua chon theo so nhieu
     * @author Trung -Tong
     */
    function process() {
        $process = $_REQUEST['process'];
        $chon = $_REQUEST['chon'];
		if (count($chon) == 0 || $process < 1) {
			if($this->Session->check('pagenew')) {
				$this->redirect($this->Session->read('pagenew'));
				exit;
			} else {
				$this->redirect('/image');
				exit;
			}            
        }
        switch ($process) {
            case '1' :
                // Update active
                foreach ($chon as $k => $v) {
                    $this->Image->updateAll(
                        array(
                        'Image.status' => 1
                        ), array(
                        'Image.id' => $k)
                    );
                }
                break;

            case '2' :
                // Update deactive
                foreach ($chon as $k => $v) {
                    $this->Image->updateAll(
                        array(
                        'Image.status' => 0
                        ), array(
                        'Image.id' => $k)
                    );
                }
                break;

            case '3' :
                // delete many rows
                $groupId = "";
                foreach ($chon as $k => $v) {
                    $groupId .= "," . $k;
                }
                $groupId = substr($groupId, 1);
                $conditions = array(
                    'Image.id IN (' . $groupId . ')'
                );
                $this->Image->deleteAll($conditions);
                break;
        }
        if ($this->Session->check('pagenew')) {
            $this->redirect($this->Session->read('pagenew'));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Thêm sản phẩm
     * @author Trung Tong
//     */

    function add() {
        if (!empty($this->data)) {
            $this->Image->create();
            $data = $this->request->data;

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            if($_FILES['userfile']['name']) {
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {


                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'image');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }
            $data['Image']['images'] = $img;
            if ($this->Image->save($data['Image'])) {
                if ($this->Session->check('pagenew')) {
                    $this->redirect($this->Session->read('pagenew'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            }
        }

        // Load model
        $this->loadModel("Listimage");
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
    }
    /**
     * Copy san pham
     */
    function copy($id = null) {
        if (!empty($this->data)) {
            $this->Image->create();
            $data['Image'] = $this->data['Recruitment'];

          $img=isset($_POST['userfile'])?$_POST['userfile']:'';
            $data['Recruitment']['images'] = $img;
            if ($this->Recruitment->save($data['Recruitment'])) {
                if ($this->Session->check('pagenew')) {
                    $this->redirect($this->Session->read('pagenew'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Thêm mơi danh mục thất bại. Vui long thử lại', true));
            }
        }

        if (empty($this->data)) {
            $this->data = $this->Recruitment->read(null, $id);
        }

        // Load modelt
        $this->loadModel("Cataloguesrec");
        $list_cat = $this->Cataloguesrec->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('edit', $this->Image->findById($id));
    }

    //close bai viet
    function close($id = null) {
        $this->Image->id = $id;
        $this->Image->saveField('status', 0);
        $this->redirect($this->Session->read('urlnew'));
    }

    // active bai viet
    function active($id = null) {
        $this->Image->id = $id;
        $this->Image->saveField('status', 1);
        $this->redirect($this->Session->read('urlnew'));
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

                'Image.name LIKE' => '%' . $keyword . '%'

            );

        }



        if ($listCat > 0) {

            $condition[] = array(

                'Image.cat_id' => $listCat

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

            'order' => 'Image.pos ASC',

            'limit' => '10'

        );

        $product = $this->paginate('Image');

        $this->set('product', $product);



        // Load model

        $this->loadModel("Listimage");

        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');

        $this->set(compact('list_cat'));

    }

    // sua tin da dang
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            if ($this->Session->check('pagenew')) {
                $this->redirect($this->Session->read('pagenew'));
            } else {
                $this->redirect(array('action' => 'index'));
            }
        }
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'image');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $_REQUEST['oldimg'];
            }

            
            $data['Image']['images'] = $img;
            if ($this->Image->save($data['Image'])) {
                if ($this->Session->check('pagenew')) {
                    $this->redirect($this->Session->read('pagenew'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Image->read(null, $id);
        }

        // Load model
        $this->loadModel("Listimage");
        $list_cat = $this->Listimage->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        
       // Edit tieng viet
        $this->Image->setLanguage('vie');
        $edit_vie = $this->Image->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Image->setLanguage('eng');
        $edit_eng = $this->Image->findById($id);
        $this->set('edit_eng', $edit_eng);
		
    }
    // Xoa cac dang
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            //$this->redirect(array('action'=>'index'));
        }
        if ($this->Image->delete($id)) {
            if ($this->Session->check('pagenew')) {
                $this->redirect($this->Session->read('pagenew'));
            } else {
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        if ($this->Session->check('pagenew')) {
            $this->redirect($this->Session->read('pagenew'));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }
}