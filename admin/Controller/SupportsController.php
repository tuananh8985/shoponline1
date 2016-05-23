<?php
/**
 * Description of SupportsController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class SupportsController extends AppController {
    
    public $name = 'Supports';
    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Support = $this->Support->find('all', array(
            'order' => array('Support. pos ASC', 'Support.modified DESC')
            ));
        $this->set('Support', $Support);
    }

    /**
     * add support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function add() {
        if (!empty($this->request->data)) {
            if ($this->Support->save($this->data)) {
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Thêm mơi danh mục thất bại. Vui long thử lại', true));
            }
        }
    }

    /**
     * editl support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $url = $this->request->url;
            $urlTmp = explode("/", $url);
            $data['Support'] = $this->data['Support'];
            if ($this->Support->save($data['Support'])) {
                 $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Support->read(null, $id);
        }
        $edit = $this->Support->findById($id);
        $this->set('edit', $edit);
    }

    /**
     * delete support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Support->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Danh mục không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];
        // Update order
        foreach ($vitri as $k => $v) {
            $this->Support->updateAll(array('Support.pos' => $v), array('Support.id' => $k));
        }
        $this->redirect(array('action' => 'index'));
    }
    
     //close danh muc
    function close($id = null) {
        $this->Support->id = $id;
        $this->Support->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active danh muc
    function active($id = null) {
        $this->Support->id = $id;
        $this->Support->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}