<?php

class AdministratorsController extends AppController {

    public $name = 'Administrators';
    public $uses = array('Administrator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    public function index() {
        $this->set('users', $this->Administrator->find('all'));
    }

    public function edit_pass($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data)) {
            $this->data = $this->Administrator->read(null, $id);
        }
    }

    public function check_pass() {
        if (!empty($this->data)) {
            $data['Administrator'] = $this->data['Administrator'];
            if ($data['Administrator']['password'] == '' || $data['Administrator']['pass2'] == '') {
                echo "<script>alert('" . json_encode('Bạn vui lòng nhập đầy đủ mật khẩu cũ và mật khẩu mới!') . "');</script>";
                echo "<script>history.back();</script>";
            } else {
                $check = $this->Administrator->findById($data['Administrator']['id']);
                if ($check['Administrator']['password'] != md5($data['Administrator']['password'])) {
                    echo "<script>alert('" . json_encode('Mật khẩu cũ không đúng! Vui lòng thực hiện lại!') . "');</script>";
                    echo "<script>history.back();</script>";
                } else {
                    $data['Administrator']['password'] = md5($data['Administrator']['pass2']);
                    if ($this->Administrator->save($data['Administrator'])) {
                        echo "<script>alert('" . json_encode('Tài khoản của bạn đã thay đổi thành công!') . "');</script>";
                        echo "<script>location.href='" . DOMAINAD . "administrators'</script>";
                    }
                }
            }
        }
    }
    public function add() {
        if (!empty($this->data)) {
            $data = $this->data;
            $data['Administrator']['password'] = md5(trim($this->data['Administrator']['password']));
            $this->Administrator->create();
            if ($this->Administrator->save($data['Administrator']))
                $this->redirect(array('action' => 'index'));
            
        }
    }

    public function delete($id = null) {
        if (!empty($id))
            $this->Administrator->delete($id);
        $this->redirect(array('action' => 'index'));
    }

}
