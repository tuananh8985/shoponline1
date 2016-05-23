<?php

App::import('Vendor', 'upload');

/**
 * Description of CatproductsController
 * @author : Trung Tong
 * @since 09-10-2012
 */
class CatproductsController extends AppController {

    public $name = 'Catproducts';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all catproducts
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Catproduct = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $id
            ),
            'order' => array('Catproduct. pos ASC', 'Catproduct.modified DESC')
            ));
        $this->set('Catproduct', $Catproduct);

        // List for combo box
        $list_cat = $this->Catproduct->generateTreeList(null, null, null, '-- ');

        // set ID
        $this->set('catId', $id);
        $this->set(compact('list_cat'));
    }

    /**
     * add catproducts
     * @author : Trung Tong
     * @param $id : id in table catproduct
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

                    $handle->Process(IMAGES_URL . 'catproduct');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }

            $this->Catproduct->create();
            $data = $this->request->data;
            $data['Catproduct']['images'] = $img;
            $data['Catproduct']['parent_id'] = $data['Catproduct']['catId'];
            if ($this->Catproduct->save($data['Catproduct'])) {
                $this->redirect('/catproducts/index/' . $data['Catproduct']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Catproduct->read(null, $id));
        $list_cat = $this->Catproduct->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl catproducts
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        $this->Catproduct->setLanguage('vie', 'eng');
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

                    $handle->Process(IMAGES_URL . 'catproduct');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $this->request->data['oldimg'];
            }

            $data = $this->request->data;
            $data['Catproduct']['images'] = $img;
            if ($this->Catproduct->save($data['Catproduct'])) {
                $this->redirect('/catproducts/index/' . $data['Catproduct']['catId']);
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Catproduct->read(null, $id);
        }
        $list_cat = $this->Catproduct->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit tieng viet
        $this->Catproduct->setLanguage('vie');
        $edit_vie = $this->Catproduct->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Catproduct->setLanguage('eng');
        $edit_eng = $this->Catproduct->findById($id);
        $this->set('edit_eng', $edit_eng);
    }

    /**
     * delete catproducts
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Catproduct->delete($id)) {
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
            $this->Catproduct->updateAll(array('Catproduct.pos' => $v), array('Catproduct.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Catproduct->id = $id;
        $this->Catproduct->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Catproduct->id = $id;
        $this->Catproduct->saveField('status', 1);
        $this->redirect($this->referer());
    }

}