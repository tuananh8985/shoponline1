<?php
App::import('Vendor', 'upload');

App::import('Vendor', 'ckeditor');

App::import('Vendor', 'ckfinder');
class CommentController extends AppController {

	var $name = 'Comment';
	var $uses=array('Comment','Product');
	
	public function get_product($id=null) {
	
	$Product=$this->Product->findById($id);
	return $Product['Product']['name'];
	
	}
		public function get_product1($id=null) {
		 
	$Product=$this->Product->findById($id);
	return $Product['Product']['name'];
	
	}
	public function index(){
		$this->account();
		$this->paginate=array('limit'=>'20','order'=>'Comment.id DESC');
		$this->set('Comment',$this->paginate('Comment',array()));
	}
	public function add(){
		$this->account();
		if(!empty($this->data)){
			$this->Comment->create();
			$data['Comment']=$this->data['Comment'];			
			if($this->Comment->save($data['Comment'])){
				$this->Session->setFlash(__('Thêm m?i thành công',true));
				$this->redirect(array('action'=>'index'));
			}
			else{
				$this->Session->setFlash(__('Thêm m?i th?t b?i'));
			}
		}
	}
	
	public function delete($id = null) {	
		$this->account();	
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn t?n t?i danh m?c này', true));
			//$this->redirect(array('action'=>'index'));
		}
		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('Xóa danh m?c thành công', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Danh m?c không xóa du?c', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function edit($id = null) {

        if (!empty($this->request->data)) {

            $data = $this->request->data;


            if ($this->Comment->save($data['Comment'])) {

              

                    $this->redirect(array('action' => 'index'));

            }

        }
		 
		   if (empty($this->request->data)) {
            $this->data = $this->Comment->read(null, $id);
        }

      
		 $edit = $this->Comment->findById($id);

        $this->set('edit', $edit);
		

    }
	public function close($id=null) {	
		//$this->account();	
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn t?n t?i ', true));
			$this->redirect(array('action'=>'index'));
		}
		$data['Comment'] = $this->data['Comment'];
		
		$data['Comment']['status']=0;
		$data['Comment']['id']=$id;
		if ($this->Comment->save($data['Comment'])) {
			$this->Session->setFlash(__('Hình ?nh không du?c hi?n th?', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Hình ?nh không close du?c', true));
		$this->redirect(array('action' => 'index'));

	}
	
	public function active($id=null) {	
		//$this->account();	
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn t?n t?i ', true));
			$this->redirect(array('action'=>'index'));
		}
		$data['Comment'] = $this->data['Comment'];
		$data['Comment']['status']=1;
		$data['Comment']['id']=$id;
		if ($this->Comment->save($data['Comment'])) {
			$this->Session->setFlash(__('Hình ?nh du?c hi?n th?', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Hình ?nh không active du?c', true));
		$this->redirect(array('action' => 'index'));

	}
	
		public function _find_list() {
		return $this->Portfolio->generatetreelist(null, null, null, '__');
	}
	//check ton tai tai khoan
	public function account(){
		if(!$this->Session->read("id") || !$this->Session->read("name")){
			$this->redirect('/');
		}
	}
	public function beforeFilter(){
		$this->layout='admin';
	}

	
	public function processing() {
		$this->account();
		if(isset($_POST['dropdown']))
			$select=$_POST['dropdown'];
			
		if(isset($_POST['checkall']))
				{
			
			switch ($select){
				case 'active':
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					$Comment['Comment']['status']=1;
					$this->Comment->save($Comment['Comment']);					
				}
				//vong lap active
				break;
				case 'notactive':	
				//vong lap huy
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					$new['Comment']['status']=0;
					$this->Comment->save($Comment['Comment']);					
				}
				break;
				case 'delete':
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					$this->Comment->delete($Comment['Comment']['id']);					
				}
				if($this->Comment->find('count')<1)
					$this->redirect(array('action' => 'index'));	
				 else
				 {
					$this->Session->setFlash(__('Danh m?c không close du?c', true));
					$this->redirect(array('action' => 'index'));
				 }
				//vong lap xoa
				break;
				
			}
		}
		else{
			
			switch ($select){
				case 'active':
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					if(isset($_POST[$Comment['Comment']['id']]))
					{
						$Comment['Comment']['status']=1;
						$this->Comment->save($Comment['Comment']);
					}
				}
				//vong lap active
				break;
				case 'notactive':	
				//vong lap huy
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					if(isset($_POST[$Comment['Comment']['id']]))
					{
						$new['Comment']['status']=0;
						$this->Comment->save($Comment['Comment']);
					}
				}
				break;
				case 'delete':
				$Comments=($this->Comment->find('all'));
				foreach($Comments as $Comment) {
					if(isset($_POST[$Comment['Comment']['id']]))
					{
					    $this->Comment->delete($Comment['Comment']['id']);
						$this->redirect(array('action'=>'index'));
					}
										
				}
				
				die;	
				//vong lap xoa
				break;
				
			}
			
		}
		$this->redirect(array('action' => 'index'));
		
	}
	
}
?>