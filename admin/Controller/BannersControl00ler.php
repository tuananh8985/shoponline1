<?php

App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of BannersController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class BannersController extends AppController {

    public $name = 'Banners';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach banner
     * Co the co nhieu banner va se hien thi banner nao duoc chon
     */
    public function index() {
        $banner = $this->Banner->find('all');
        $this->set('banner', $banner);
    }

    /**
     * Thêm banner
     * @author Trung Tong
     */   
	 function add111($id = null) {
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

                    $handle->Process(IMAGES_URL . 'banner');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }

            $this->Banner->create();
            $data = $this->request->data;
            $data['Banner']['images'] = $img;
          //  $data['Banner']['parent_id'] = $data['Banner']['catId'];
            if ($this->Banner->save($data['Banner'])) {
            $this->redirect("/banners");
                exit;
            }
        }
       
    }
     function add() {
        if (!empty($this->request->data)) {
            $this->Banner->create();
            $data['Banner'] = $this->data['Banner'];

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

                $handle->Process(IMAGES_URL . 'banners');
                if ($handle->processed) {
                    $img = $handle->file_dst_name;
                }
            }
            $data['Banner']['images'] = $img;
            if ($this->Banner->save($data['Banner'])) {
                $this->Session->setFlash(__('Thêm mới quảng cáo thành công', true));
                $this->redirect("/banners");
            } else {
                $this->Session->setFlash(__('Thêm quảng cáo thất bại. Vui long thử lại', true));
            }
        }
    }

    /**
     * Edit banner
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Banner'] = $this->data['Banner'];
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'banner');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $_REQUEST['oldimg'];
            }

            $data['Banner']['images'] = $img;
            $data['Banner']['modified'] = date('Y-m-d');
            if ($this->Banner->save($data['Banner'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Banner->read(null, $id);
        }
        $this->set('edit', $this->Banner->findById($id));
    }

    /**
     * Select banner
     * update status = 1
     */
    public function selectBanner() {
        $chon = $_REQUEST['chon'];

        /**
         * update tat ca ve 0
         */
        $this->Banner->updateAll(array('Banner.status' => 0));

        /**
         * Update banner duoc chon
         */
        $this->Banner->updateAll(array('Banner.status' => 1), array('Banner.id' => $chon));
        $this->redirect("/banners");
    }
    
    // Xoa banner
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            //$this->redirect(array('action'=>'index'));
        }
        if ($this->Banner->delete($id)) {
            $this->Session->setFlash(__('Xóa bài viết thành công', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }

}