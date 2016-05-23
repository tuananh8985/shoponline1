<?php
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');
App::uses('AppHelper', 'View/Helper');
/**
 * Description of HomeComtroller
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class HomeController extends AppController {

    public $name = 'Home';
    public $uses = array('Comment','Email','Product', 'Catproduct', 'Setting', 'Post','Slideshow','News','Tintuc');
	public function dangnhap(){}
    public function beforeFilter() {
        parent::beforeFilter();
	
        $setting = $this->Setting->find('first');
        $this->set('title_for_layout', $setting['Setting']['title']);
        $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
        $this->set('description_for_layout', $setting['Setting']['meta_des']);
    }

	
	public function index($id = null) {
	    
   
		// list tin nổi bật
        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
				'News.hot' => 1,
				'News.cat_id' => 8,
            ),
            'order' => 'News.pos ASC, News.modified DESC',
            'limit' => '3'
        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
		
    }
	// Đăng ký nhận tin	
	
	
	//tìm kiếm
	  public function search() {
		$keyword='';
        if(isset($_POST['txtsearch'])) {
		$keyword=$_POST['txtsearch'];$this->Session->write('txtsearch',$keyword);
		}
		elseif($this->Session->check('keyword')){$keyword=$this->Session->read('txtsearch');  }
        $this->set('keyword', $keyword);
        // list all News
		$count=$this->News->find('count',array(
            'conditions' => array(
                'News.status' => 1,
                'News.name LIKE' => '%' . $keyword . '%',
            )));
		$this->set('count', $count);
        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
                'News.name LIKE' => '%' . $keyword . '%',
            ),
            'order' => 'News.id DESC, News.modified DESC',
            'limit' => '5'
        );
        $listProduct = $this->paginate('News');
        $this->set('listProduct', $listProduct);
		
    }
}