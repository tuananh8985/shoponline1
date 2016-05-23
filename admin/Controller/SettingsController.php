<?php

App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of SettingsController
 * @author : Trung Tong
 * @since Oct 14, 2012
 */
class SettingsController extends AppController {

    public $name = 'Settings';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }
  public function index() {
        if (!empty($this->request->data)) {
            $data['Setting'] = $this->data['Setting'];
            
            $img=isset($_POST['userfile'])? $_POST['userfile']:'';
            $data['Setting']['baogia'] = $img;
            
            if ($this->Setting->save($data['Setting'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect("/settings");
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Setting->read(null, 1);
        }
        $edit = $this->Setting->findById(1);
        $this->set('edit', $edit);
    }
//    public function index($id = null) {
//        
//
//            if (!empty($this->request->data)) {
//                $data = $this->request->data;
//         
//            if ($this->Setting->save($data['Setting'])) {
//     
//                    $this->redirect(array('action' => 'index'));
//                
//            }  
//            
//        }
//         if (empty($this->request->data)) {
//                $this->data = $this->Setting->read(null, $id);
//            }
//            // Load mode
//            $this->loadModel("Setting");
//            //$list_cat = $this->Setting->generateTreeList(null, null, null, '-- ');
//            //   $this->set(compact('list_cat'));
//     
//            // Edit tieng viet
//            $this->Setting->setLanguage('vie');
//            $edit_vie = $this->Setting->findById($id);
//            $this->set('edit_vie', $edit_vie);
//            
//          //  pr($edit_vie);die;
//
//            // Edit tieng anh
//            $this->Setting->setLanguage('eng');
//            $edit_eng = $this->Setting->findById($id);
//            $this->set('edit_eng', $edit_eng);
//    }

}