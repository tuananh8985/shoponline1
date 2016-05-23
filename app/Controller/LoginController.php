<?php

class LoginController extends AppController {



	public $name = 'Login';
	
	var $helpers = array('Session');
    public $uses = array('User', 'Setting','Usermember');
    public $translate = array('name');
    public $components = array('Email');
	
	

	//public $components = array('Global','Email','SmtpEmail','Upload');	
	public function index() {
	
			

	}

	public function check_login() {	
	if(!empty($_POST['email']) && !empty($_POST['password'])){

			$check=$this->Usermember->findByEmail($_POST['email']);

			if($check){

			if($check['Usermember']['status']==0){
					echo "<script>alert('".json_encode('Tài khoản chưa được kích hoạt hoặc đang bị khóa !')."');</script>";

					echo "<script>location.href='".DOMAIN."dang-nhap.html'</script>";
				}
				
				if($check['Usermember']['password']==md5($_POST['password'])){

					$this->Session->write('user_id',$check['Usermember']['id']);

					$this->Session->write('email',$check['Usermember']['email']);

					$this->Session->write('user_name',$check['Usermember']['name']);
					$this->Session->write('phone',$check['Usermember']['phone']);
					$this->Session->write('address',$check['Usermember']['address']);
					
								

					echo "<script>alert('".json_encode('Chúc mừng bạn đã đăng nhập thành công !')."');</script>";

					echo "<script>location.href='".DOMAIN."'</script>";

				}

				else {

						echo "<script>alert('".json_encode('Mật khẩu không đúng !')."');</script>";

						echo "<script>location.href='".DOMAIN."dang-nhap.html'</script>";

				}
				
				
				

			}else{

				echo "<script>alert('".json_encode('Email không đúng !')."');</script>";

				echo "<script>history.back(-1);</script>";

			}

			

		}
		die;

	}

	public function logout() {

			$this->Session->delete('user');
			$this->Session->delete('email');
			$this->Session->delete('name');
			$this->Session->delete('address');
			$this->Session->delete('phone');
	


		$this->redirect('/');

	}


/* Ham khoi tao capcha*/
	public function create_image(){
		$md5_hash = md5(rand(0,999));
		$security_code = substr($md5_hash, 15, 5);
		$this->Session->write('security_code',$security_code);
		$width = 80;
		$height = 22;
		$image = ImageCreate($width, $height);
		$black = ImageColorAllocate($image, 37, 170, 226);
		$white = ImageColorAllocate($image, 255, 255, 255);
		ImageFill($image, 0, 0, $black);
		ImageString($image, 5, 18, 3, $security_code, $white);
		header("Content-Type: image/jpeg");
		ImageJpeg($image);
		ImageDestroy($image);
	}	
	public function create_image1($random){
		
		$md5_hash = md5(rand(0,999));
		$security_code = substr($md5_hash, 15, 5);
		$this->Session->write('security_code',$security_code);
		$width = 80;
		$height = 22;
		$image = ImageCreate($width, $height);
		$black = ImageColorAllocate($image, 37, 170, 226);
		$white = ImageColorAllocate($image, 255, 255, 255);
		ImageFill($image, 0, 0, $black);
		ImageString($image, 5, 18, 3, $security_code, $white);
		header("Content-Type: image/jpeg");
		ImageJpeg($image);
		ImageDestroy($image);
		
	}
	
public function quenmk(){

}


}

?>

