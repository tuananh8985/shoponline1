<?php

/**
 * Description of NewsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class PostController extends AppController {

    public $name = 'Post';
    public $uses = array('Post');

  	// list all học bổng
	public function hocbong() {
	$this->set('title_for_layout', 'Học bổng');
        $this->paginate = array(
            'conditions' => array(
                'Post.status' => 1,
				'Post.display' => 1,
            ),
            'order' => 'Post.id DESC, Post.modified DESC',
            'limit' => '5'
        );
        $listNews = $this->paginate('Post');
        $this->set('listNews', $listNews);
    }
	
	// list all q-a
	public function qa() {
	$this->set('title_for_layout', 'Q & A');
        $this->paginate = array(
            'conditions' => array(
                'Post.status' => 1,
				'Post.display' => 2,
            ),
            'order' => 'Post.id DESC, Post.modified DESC',
            'limit' => '5'
        );
        $listNews = $this->paginate('Post');
        $this->set('listNews', $listNews);
    }
	
	// list all tuyển dụng
	public function tuyendung() {
	$this->set('title_for_layout', 'Tuyển dụng');
        $this->paginate = array(
            'conditions' => array(
                'Post.status' => 1,
				'Post.display' => 3,
            ),
            'order' => 'Post.id DESC, Post.modified DESC',
            'limit' => '5'
        );
        $listNews = $this->paginate('Post');
        $this->set('listNews', $listNews);
    }
  public function index() {

        // list all Post

        $this->paginate = array(

            'conditions' => array(

                'Post.status' => 1

            ),

            'order' => 'Post.pos DESC, Post.modified DESC',

            'limit' => '6'

        );

        $listNews = $this->paginate('Post');

        $this->set('listNews', $listNews);

    }
  public function detail($id = null) {
		
        $detailNews = $this->Post->findById($id);
        $this->set('detailNews', $detailNews);

		
		$this->set('title_for_layout', $detailNews['Post']['name']);
        $this->set('keywords_for_layout', $detailNews['Post']['meta_key']);
        $this->set('description_for_layout', $detailNews['Post']['meta_des']);
		 $typeName = $this->Post->read(null, $detailNews['Post']['cat_id']);

		 $this->set('typeName', $typeName);

		 

		  // list all Post

        $this->paginate = array(

            'conditions' => array(

                'Post.status' => 1,

                'Post.cat_id' => $detailNews['Post']['cat_id'],

				'Post.id <>' => $id,

            ),

            'order' => 'Post.pos DESC, Post.modified DESC',



        );

        $listNews = $this->paginate('Post');

        $this->set('listNews', $listNews);

		$this->Session->write('url','chi-tiet-so-luoc/'.$id.$detailNews['Post']['slug'].'.html');

		

    }
	public function listNews() {

        // list all Post

        $this->paginate = array(

            'conditions' => array(

                'Post.status' => 1

            ),

            'order' => 'Post.pos DESC, Post.modified DESC',

            'limit' => '6'

        );

        $listNews = $this->paginate('Post');

        $this->set('listNews', $listNews);

    }

  
    
	

}