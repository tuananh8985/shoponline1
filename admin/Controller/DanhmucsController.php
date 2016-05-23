<?php

App::import('Vendor', 'upload');

/**
 * Description of CatproductsController
 * @author : Trung Tong
 * @since 09-10-2012
 */
class DanhmucsController extends AppController {

    public $name = 'Danhmucs';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all Danhmucs
     * @author : Trung Tong
     * @param $id : id in table Danhmucs
     */
    public function index($id = null) {
        $Danhmuc = $this->Danhmuc->find('all', array(
            'conditions' => array(
                'Danhmuc.parent_id' => $id
            ),
            'order' => array('Danhmuc. pos ASC', 'Danhmuc.modified DESC')
            ));
        $this->set('Danhmuc', $Danhmuc);

        // List for combo box
        $list_cat = $this->Danhmuc->generateTreeList(null, null, null, '-- ');

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

                    $handle->Process(IMAGES_URL . 'danhmuc');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }

            $this->Danhmuc->create();
            $data = $this->request->data;
            $data['Danhmuc']['images'] = $img;
            $data['Danhmuc']['parent_id'] = $data['Danhmuc']['catId'];
            if ($this->Danhmuc->save($data['Danhmuc'])) {
                $this->redirect('/danhmucs/index/' . $data['Danhmuc']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Danhmuc->read(null, $id));
        $list_cat = $this->Danhmuc->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl catproducts
     * @author : Trung Tong
     * @param $id : id in table Danhmuc
     */
    function edit($id = null) {
        $this->Danhmuc->setLanguage('vie', 'eng');
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

                    $handle->Process(IMAGES_URL . 'danhmuc');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $this->request->data['oldimg'];
            }

            $data = $this->request->data;
            $data['Danhmuc']['images'] = $img;
            if ($this->Danhmuc->save($data['Danhmuc'])) {
                $this->redirect('/danhmucs/index/' . $data['Danhmuc']['catId']);
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Danhmuc->read(null, $id);
        }
        $list_cat = $this->Danhmuc->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit tieng viet
        $this->Danhmuc->setLanguage('vie');
        $edit_vie = $this->Danhmuc->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Danhmuc->setLanguage('eng');
        $edit_eng = $this->Danhmuc->findById($id);
        $this->set('edit_eng', $edit_eng);
		
		 // Edit tieng trung
        $this->Danhmuc->setLanguage('chi');
        $edit_chi = $this->Danhmuc->findById($id);
        $this->set('edit_chi', $edit_chi);
    }

    /**
     * delete catproducts
     * @author : Trung Tong
     * @param $id : id in table Danhmuc
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Danhmuc->delete($id)) {
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
            $this->Danhmuc->updateAll(array('Danhmuc.pos' => $v), array('Danhmuc.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Danhmuc->id = $id;
        $this->Danhmuc->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Danhmuc->id = $id;
        $this->Danhmuc->saveField('status', 1);
        $this->redirect($this->referer());
    }

}