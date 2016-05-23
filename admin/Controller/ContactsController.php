<?php

class ContactsController extends AppController {

    public $name = 'Contact';
    public $uses = array('Contact');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }
	public function excel($id = null)
    {
        $this->autoLayout = false;

        $this->Email->recursive = 1;
        
        $data = $this->Email->find('all', array('conditions'=>array(),'order'=>'Email.id DESC'));

                
        $this->set('rows',$data);
    }
   function index() {
		 
		
		  $this->paginate = array('limit' => '15','order' => 'Contact.id DESC');
	      $this->set('Contact', $this->paginate('Contact',array()));
		
		  
	}
	
	//view mot tin 
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Không tồn tại', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('views', $this->Contact->read(null, $id));
	}
	

	function search() {
		
	  
		$keyword=isset($_POST['name'])? $_POST['name'] : '';
		
	
		$this->paginate = array('conditions'=>array('Contact.name like'=>'%'.$keyword.'%'),'limit' => '12','order' => 'Contact.id DESC');
		
		
		$this->set('Contact', $this->paginate('Contact',array()));	
		$this->render('index');
		
       
		
	}
	function processing() {
		
		if(isset($_POST['dropdown']))
			$select=$_POST['dropdown'];
			
	
			
			switch ($select){
				case 'active':
				$Contact=($this->Contact->find('all'));
				foreach($Contact as $new) {
					if(isset($_POST[$new['Contact']['id']]))
					{
						$new['Contact']['status']=1;
						$this->Contact->save($new['Contact']);
					}
				}
				//vong lap active
				break;
				case 'notactive':	
				//vong lap huy
				$Contact=($this->Contact->find('all'));
				foreach($Contact as $new) {
					if(isset($_POST[$new['Contact']['id']]))
					{
						$new['Contact']['status']=0;
						$this->Contact->save($new['Contact']);
					}
				}
				break;
				case 'delete':
				$Contact=($this->Contact->find('all'));
				foreach($Contact as $new) {
					if(isset($_POST[$new['Contact']['id']]))
					{
					    $this->Contact->delete($new['Contact']['id']);
					
					}
										
				}
				
					
				//vong lap xoa
				break;
				
			
			
		}
		$this->redirect(array('action' => 'index'));
		
	}
	
	//close tin tuc
	function close($id=null) {
		
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn tồn tại bài viết này', true));
			$this->redirect(array('action'=>'index'));
		}
		$data['Email'] = $this->data['Email'];
		$data['Email']['status']=0;
		if ($this->Email->save($data['Email'])) {
			$this->Session->setFlash(__('Bài viết không được hiển thị', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bài viết không close được', true));
		$this->redirect(array('action' => 'index'));

	}
	// active tin bai viêt
	function active($id=null) {
		
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn tồn tại bài viết này', true));
			$this->redirect(array('action'=>'index'));
		}
		$data['Email'] = $this->data['Email'];
		$data['Email']['status']=1;
		if ($this->Email->save($data['Email'])) {
			$this->Session->setFlash(__('Bài viết được hiển thị', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bài viết không hiển được bài viết', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	// Xoa cac dang
	function delete($id = null) {
				
		if (empty($id)) {
			$this->Session->setFlash(__('Khôn tồn tại bài viết này', true));
			//$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Xóa bài viết thành công', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bài viết không xóa được', true));
		$this->redirect(array('action' => 'index'));
	}
	
	

}
