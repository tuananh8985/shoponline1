<?php

App::import('Vendor', 'upload');

/**
 * Description of ContactController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class ContactController extends AppController {

    public $name = 'Contact';
    public $uses = array('Settings', 'Contact');
    public $components = array('Email');

    public function index() {
		$this->set('title_for_layout','Liên hệ');//pr($typeName);die;
        $x = $this->Settings->read(null, 1);
        if ($this->request->is('post')) {
            
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $noidung = $_POST['content1'];

            $this->Email->from = $name . '<' . $email . '>';
            $this->Email->to = $x['Settings']['email'];
            $this->Email->subject = $title;
            $this->Email->template = 'default';
            $this->Email->sendAs = 'both';
            $this->set('name', $name);
            $this->set('mobile', $mobile);
            $this->set('email', $email);
            $this->set('title', $title);
            $this->set('content1', $noidung);
            $this->Contact->save($this->data);
		
			
			 if ($this->Email->send()) {
                $this->Session->setFlash(__('Thêm mới danh mục thành công', true));
                echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
            }
            else
                $this->Session->setFlash(__('Thêm mơi danh mục thất bại. Vui long thử lại', true));
            echo '<script language="javascript"> alert("gửi mail không thành công"); location.href="' . DOMAIN . '";</script>';
			
            
        }
    }
}