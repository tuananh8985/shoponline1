<?php

/**
 * Description of NewsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class NewsController extends AppController {

    public $name = 'News';
    public $uses = array('News','Catalogue');
  
	public function index($id = null) {
    $typeName = $this->Catalogue->read(null, $id);
	$this->set('typeName', $typeName);	
	
	$this->set('title_for_layout',$typeName['Catalogue']['name']);
	$this->set('keywords_for_layout', $typeName['Catalogue']['meta_key']);
    $this->set('description_for_layout', $typeName['Catalogue']['meta_des']);
	
	$parmenu = $this->Catalogue->find('list', array(
            'conditions' => array(
                'Catalogue.parent_id' => $id,
                'Catalogue.status' => 1
    )
                ));
	$mang=array();$i=0;
	$mang[$i++]=$id;
	foreach($parmenu as $key=>$value){
	$mang[$i++]=$key;
	}
	if($id!=null) {
	// list all News
		$this->paginate = array(
			'conditions' => array(
			'News.status' => 1,
			'News.cat_id' => $mang
		),
			'order' => 'News.id DESC, News.modified DESC',
			'limit' => '5'
		);
	}
	else {
		$this->paginate = array(
		'conditions' => array(
		'News.status' => 1,),
		'order' => 'News.pos DESC, News.modified DESC',
		'limit' => '5'
		);
	}
	$listNews = $this->paginate('News');
	$this->set('listNews', $listNews);        
    }
 public function detail($id = null) {

        $detailNews = $this->News->findById($id);
        $this->set('detailNews', $detailNews);

		$this->set('title_for_layout', $detailNews['News']['name']);
        $this->set('keywords_for_layout', $detailNews['News']['meta_key']);
        $this->set('description_for_layout', $detailNews['News']['meta_des']);

		$typeName = $this->Catalogue->read(null, $detailNews['News']['cat_id']);
		$this->set('typeName', $typeName);
		// list all News

        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
                'News.cat_id' => $detailNews['News']['cat_id'],
            ),

            'order' => 'News.id DESC, News.modified DESC',
            'limit' => '5'

        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
    }
}