<?php

App::import('Vendor', 'upload');

App::import('Vendor', 'ckeditor');

App::import('Vendor', 'ckfinder');

/**
 * Description of SlideshowsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class SlideshowsController extends AppController {
    
    public $name = 'Slideshows';
    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach slide show
     */
    public function index() {
        $advs = $this->Slideshow->find('all', array(
            'order' => 'Slideshow.pos ASC'
        ));
        $this->set('advs', $advs);
    }
    
    /**
     * Thêm slide show
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Slideshow->create();
            $data['Slideshow'] = $this->data['Slideshow'];

      $img=isset($_POST['userfile'])?$_POST['userfile']:'';
            $data['Slideshow']['images'] = $img;
            if ($this->Slideshow->save($data['Slideshow'])) {
                $this->Session->setFlash(__('Thêm mới quảng cáo thành công', true));
                $this->redirect("/slideshows");
            } else {
                $this->Session->setFlash(__('Thêm quảng cáo thất bại. Vui long thử lại', true));
            }
        }
    }

    /**
     * Edit slide show
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Slideshow'] = $this->data['Slideshow'];
          
			
            $img=isset($_POST['userfile'])?$_POST['userfile']:'';
			
            $data['Slideshow']['images'] = $img;
            $data['Slideshow']['modified'] = date('Y-m-d');
            if ($this->Slideshow->save($data['Slideshow'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Slideshow->read(null, $id);
        }
        
    	$this->set('edit', $this->Slideshow->findById($id));
	}

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Slideshow->updateAll(
                array(
                'Slideshow.pos' => $v
                ), array(
                'Slideshow.id' => $k)
            );
        }
        $this->redirect(array('action' => 'index'));
    }
    
    // Xoa slide show
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Slideshow->delete($id)) {
            $this->Session->setFlash(__('Xóa bài viết thành công', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }
    
    //close slide show
    function close($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active slide show
    function active($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}