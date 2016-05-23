<?php

/**
 * Description of NewsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class TintucController extends AppController {

    public $name = 'Tintuc';
    public $uses = array('Tintuc','Danhmuc');
	

	public function index($id = null) {
	
        $typeName = $this->Danhmuc->read(null, $id);
        $this->set('typeName', $typeName);
		
		$this->set('title_for_layout', 'Tin tức');
        $this->set('keywords_for_layout', $typeName['Danhmuc']['meta_key']);
        $this->set('description_for_layout', $typeName['Danhmuc']['meta_des']);
		
		$parmenu = $this->Danhmuc->find('list', array(
            'conditions' => array(
                'Danhmuc.parent_id' => $id,
                'Danhmuc.status' => 1
            )
                ));
		$mang=array();$i=0;
		$mang[$i++]=$id;
		foreach($parmenu as $key=>$value){
		$mang[$i++]=$key;
		}
		if($id!=null) {
        // list all Tintuc
        $this->paginate = array(
            'conditions' => array(
                'Tintuc.status' => 1,
                'Tintuc.cat_id' => $mang
            ),
            'order' => 'Tintuc.pos ASC, Tintuc.modified DESC',
        );
		}
		else {
		       $this->paginate = array(
            'conditions' => array(
                'Tintuc.status' => 1,
            ),
            'order' => 'Tintuc.id ASC, Tintuc.modified DESC',
        );
		}
        $listNews = $this->paginate('Tintuc');
        $this->set('listNews', $listNews);
    }
	  public function detail($id = null) {
        $detailNews = $this->Tintuc->findById($id);
        $this->set('detailNews', $detailNews);
		
		$this->set('title_for_layout', $detailNews['Tintuc']['name']);
        $this->set('keywords_for_layout', $detailNews['Tintuc']['meta_key']);
        $this->set('description_for_layout', $detailNews['Tintuc']['meta_des']);
		
		$typeName = $this->Danhmuc->read(null, $detailNews['Tintuc']['cat_id']);
		 $this->set('typeName', $typeName);
		 
		 if($typeName['Danhmuc']['parent_id']==null)
		 $this->set('id', $detailNews['Tintuc']['cat_id']);
		else $this->set('id',$typeName['Danhmuc']['parent_id']);
		
		  // list all Tintuc
        $this->paginate = array(
            'conditions' => array(
                'Tintuc.status' => 1,
                'Tintuc.cat_id' => $detailNews['Tintuc']['cat_id'],
				'Tintuc.id <>' => $id,
            ),
            'order' => 'Tintuc.id DESC, Tintuc.modified DESC',
            'limit' => '6'
        );
		$listNews = $this->paginate('Tintuc');
        $this->set('listNews', $listNews);
    }
}