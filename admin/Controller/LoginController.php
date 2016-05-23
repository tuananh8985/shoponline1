<?php

class LoginController extends AppController {

    public $name = 'Login';
    public  $helpers = array('Session', 'Form', 'Html');
    public $uses = array('Administrator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'login';
    }

    public function index() {
        
    }

    /*
     * Check Login
     * @create : 09-10-2012
     */
    function login() {
        $data['Administrator'] = $this->data['Administrator'];
        if (empty($data['Administrator']['name'])) {
            $this->Session->setFlash(__('Xin vui lòng nhập tên đăng nhập', true));
            $this->redirect(array('action' => 'index'));
        } elseif (empty($data['Administrator']['password'])) {
            $this->Session->setFlash(__('Xin vui lòng nhập mật khẩu', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $chek = $this->Administrator->findByName($data['Administrator']['name']);
            if ($chek) {
                if ($chek['Administrator']['password'] == md5($data['Administrator']['password'])) {
                    $this->Session->write('id', $chek['Administrator']['id']);
                    $this->Session->write('name', $chek['Administrator']['name']);
                    $this->redirect('/home');
                } else {
                    $this->Session->setFlash(__('Mật khẩu không đúng !', true));
                    $this->redirect('/');
                }
            } else {
                $this->Session->setFlash(__('Xin vui lòng đăng nhập lại', true));
                    $this->redirect('/');
            }
        }
    }

    //lay lai password
    function password() {
        $this->layout = 'password';
    }

    function check_pass() {
        
    }

    //logout ra khoi he thong
    function logout() {
        $this->Session->delete('id');
        $this->Session->delete('name');
        $this->redirect(array('action' => 'index'));
    }

}
