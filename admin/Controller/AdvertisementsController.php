<?php

App::import('Vendor', 'upload');

/**
 * Description of AdvertisementsController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class AdvertisementsController extends AppController {
    
    public $name = 'Advertisements';
    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach quang cao
     */
    public function index() {
        $advs = $this->Advertisement->find('all', array(
            'order' => 'Advertisement.pos ASC'
        ));
        $this->set('advs', $advs);
    }
    
    /**
     * Thêm quang cao
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Advertisement->create();
            $data['Advertisement'] = $this->data['Advertisement'];

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            $handle = new upload($_FILES['userfile']);
            if ($handle->uploaded) {

                // Neu resize
//                $handle->image_resize          = true;
//                $handle->image_ratio_y        = true;
//                $handle->image_x                 = 790;

                $filename = date('YmdHis') . md5(rand(10000, 99999));
                $handle->file_new_name_body = $filename;

                $handle->Process(IMAGES_URL . 'logo');
                if ($handle->processed) {
                    $img = $handle->file_dst_name;
                }
            }
            $data['Advertisement']['images'] = $img;
            if ($this->Advertisement->save($data['Advertisement'])) {
                $this->Session->setFlash(__('Thêm mới quảng cáo thành công', true));
                $this->redirect("/advertisements");
            } else {
                $this->Session->setFlash(__('Thêm quảng cáo thất bại. Vui long thử lại', true));
            }
        }
    }

    /**
     * Edit quang cao
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Advertisement'] = $this->data['Advertisement'];
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'logo');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $_REQUEST['oldimg'];
            }

            $data['Advertisement']['images'] = $img;
            $data['Advertisement']['modified'] = date('Y-m-d');
            if ($this->Advertisement->save($data['Advertisement'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Advertisement->read(null, $id);
        }
        $this->set('edit', $this->Advertisement->findById($id));
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Advertisement->updateAll(
                array(
                'Advertisement.pos' => $v
                ), array(
                'Advertisement.id' => $k)
            );
        }
        $this->redirect(array('action' => 'index'));
    }
    
    // Xoa quang cao
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Advertisement->delete($id)) {
            $this->Session->setFlash(__('Xóa bài viết thành công', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }
    
    //close quang cao
    function close($id = null) {
        $this->Advertisement->id = $id;
        $this->Advertisement->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active quang cao
    function active($id = null) {
        $this->Advertisement->id = $id;
        $this->Advertisement->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}