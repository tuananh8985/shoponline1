<?php

App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of PostsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class PostsController extends AppController {

    public $name = 'Posts';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/index');
        }
    }

    /**
     * Danh sách sản phẩm
     * @author Trung Tong
     */
    function index() {
        $this->paginate = array(
            'order' => 'Post.pos DESC, Post.modified DESC',
            'limit' => '10'
        );
        $listPost = $this->paginate('Post');
        $this->set('listPosts', $listPost);

        // Tang so thu tu * limit (example : 10)
        $urlTmp = DOMAINAD . $this->request->url;
        $urlTmp = explode(":", $urlTmp);
        if (isset($urlTmp[2])) {
            $startPage = ($urlTmp[2] - 1) * 10 + 1;
        } else {
            $startPage = 1;
        }
        $this->set('startPage', $startPage);
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Post->updateAll(
                array(
                'Post.pos' => $v
                ), array(
                'Post.id' => $k)
            );
        }
        $this->redirect('/posts');
    }

    /**
     * Thêm sản phẩm
     * @author Trung Tong
     */
 function add() {
 $img="";
        if (!empty($this->data)) {
            $this->Post->create();
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

                    $handle->Process(IMAGES_URL . 'post');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = null;
            }
            $data['Post']['images'] = $img;
            if ($this->Post->save($data['Post'])) {
              
                    $this->redirect(array('action' => 'index'));
                
            }
        }

        // Load model
        $this->loadModel("Catalogue");
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
    }
   /* function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Post'] = $this->data['Post'];

            if ($this->Post->save($data['Post'])) {
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Post->read(null, $id);
        }
        // Edit tieng viet
        $this->Post->setLanguage('vie');
        $edit_vie = $this->Post->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Post->setLanguage('eng');
        $edit_eng = $this->Post->findById($id);
        $this->set('edit_eng', $edit_eng);
    }

    //close bai viet
    function close($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 0);
        $this->redirect('/posts');
    }

    // active bai viet
    function active($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 1);
        $this->redirect('/posts');
    }
*/
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

                    $handle->Process(IMAGES_URL . 'post');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
               $img = $_REQUEST['oldimg'];
            }

            $data['Post']['images'] = $img;
            if ($this->Post->save($data['Post'])) {
              
                   
                    $this->redirect(array('action' => 'index'));
            
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Post->read(null, $id);
        }

        // Load model
        $this->loadModel("Catalogue");
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        
       // Edit tieng viet
        $this->Post->setLanguage('vie');
        $edit_vie = $this->Post->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Post->setLanguage('eng');
        $edit_eng = $this->Post->findById($id);
        $this->set('edit_eng', $edit_eng);
    // Edit tieng trung
        $this->Post->setLanguage('chi');
        $edit_chi = $this->Post->findById($id);
        $this->set('edit_chi', $edit_chi);
	}
    // Xoa cac dang
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            //$this->redirect(array('action'=>'index'));
        }
        if ($this->Post->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }

}