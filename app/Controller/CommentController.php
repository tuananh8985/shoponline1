<?php

/**
 * Description of CommentController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class CommentController extends AppController {

      public $name = 'Comment';
    public $uses = array('Advertisement','Comment','Duhoc','Tintuc','Danhmuc','Catalogue','News', 'Slideshow','Support', 'Banner','Setting','Post','Listimage','Image','Catproduct','Product');
	
	function getRecruitment($catId = null) {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this-> Listimage ->find('all', array('conditions' => array('Listimage.status' => 1, 'Listimage.parent_id' => $catId)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Listimage']['id'];
        }
        return $this->Image->find('all', array('conditions' => array('Image.status' => 1, 'Image.cat_id' => $cat1)));
    }
	function get_newsale($catId = 6) {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this-> Catalogue ->find('all', array('conditions' => array('Catalogue.status' => 1, 'Catalogue.parent_id' => $catId)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Catalogue']['id'];
        }
        return $this->News->find('all', array('conditions' => array('News.status' => 1, 'News.cat_id' => $cat1),'limit'=>7));
    }
	public function quangcao_trai() { 
		$qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1,
                'Advertisement.display' => 1
				
            ),
            'order' => 'Advertisement.pos ASC',
            'limit' => 2,
            ));
        return $qcao;
	}
 public function quangcao_phai() { 
  $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1,
                'Advertisement.display' => 2
				
            ),
            'order' => 'Advertisement.pos ASC',
            'limit' => 2,
            ));
        return $qcao;
 }
	function getlienthong($catId = 6) {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this-> Catalogue ->find('all', array('conditions' => array('Catalogue.status' => 1, 'Catalogue.parent_id' => $catId)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Catalogue']['id'];
        }
        return $this->News->find('all', array('conditions' => array('News.status' => 1,'News.hot' => 1, 'News.cat_id' => $cat1),'limit'=>3));
    }
	function menu_top($id = null) {
        return $this->Catalogue->find('all', array('conditions' => array('Catalogue.status' => 1, 'Catalogue.parent_id' => $id), 'order' => 'Catalogue.pos ASC'));
    }
	//menu top sản phẩm
	function menu_sanpham($id = null) {
        return $this->Catproduct->find('all', array('conditions' => array('Catproduct.status' => 1,'Catproduct.parent_id' => $id), 'order' => 'Catproduct.pos ASC'));
    }
	//slide show
    public function slideshow() {
        $slideshow = $this->Slideshow->find('all', array('conditions' => array('Slideshow.status' => 1,'Slideshow.display' => 1),'order' => 'Slideshow.id DESC'));
        return $slideshow;

    }
	public 	function get_comment2($id=null) {
	return $this->Comment->find('all',array('conditions'=>array(),'limit'=>20,'order'=>'Comment.id DESC'));
	
	}
	public 	function get_comment1($id=null) {
	return $this->Comment->find('all',array('conditions'=>array('Comment.product_id'=>$id),'limit'=>20,'order'=>'Comment.id ASC'));
	
	}
	//menu left
	function menu_left($id = null) {
        return $this->Danhmucduhoc->find('all', array('conditions' => array('Danhmucduhoc.status' => 1,'Danhmucduhoc.setoff' => 1, 'Danhmucduhoc.parent_id' => $id), 'order' => 'Danhmucduhoc.pos ASC'));
    }
	//menu left 3
	function menu_left3($id = null) {
        return $this->Danhmucduhoc->find('all', array('conditions' => array('Danhmucduhoc.status' => 1, 'Danhmucduhoc.display' => 1, 'Danhmucduhoc.parent_id' => $id), 'order' => 'Danhmucduhoc.pos ASC'));
    }
	//menu left 2
	function menu_left2($id = 6) {
        return $this->Catalogue->find('all', array('conditions' => array('Catalogue.status' => 1, 'Catalogue.parent_id' => $id), 'order' => 'Catalogue.pos ASC'));
    }
	//menu footer
	function menu_footer($id = null) {
        return $this->Catalogue->find('all', array('conditions' => array('Catalogue.status' => 1,'Catalogue.display' => 1, 'Catalogue.parent_id' => $id), 'order' => 'Catalogue.pos ASC'));
    }
	//Adv left
    public function adv_left() {
        $adv = $this->Slideshow->find('all', array('conditions' => array('Slideshow.status' => 1,'Slideshow.display' => 2),'order' => 'Slideshow.id DESC'));
        return $adv;

    }
	//Adv left
    public function adv_doitac() {
        $adv = $this->Slideshow->find('all', array('conditions' => array('Slideshow.status' => 1,'Slideshow.display' => 4),'order' => 'Slideshow.id DESC'));
        return $adv;

    }
	function listdanhmuc($id = null) {
        return $this->Danhmucduhoc->find('all', array('conditions' => array('Danhmucduhoc.status' => 1,'Danhmucduhoc.home' => 1, 'Danhmucduhoc.parent_id' => $id), 'order' => 'Danhmucduhoc.pos ASC'));
    }
	
	
	function catrecruitment() {
        return $this->Listimage->find('all', array('conditions' => array('Listimage.status' => 1, 'Listimage.parent_id' => null)));
    }
	function get_pro($catId = null) {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this-> Catproduct ->find('all', array('conditions' => array('Catproduct.status' => 1, 'Catproduct.parent_id' => $catId)));

        foreach ($cat as $row){
            $cat1[$i++]=$row['Catproduct']['id'];
        }
        return $this->Product->find('all', array(
		'conditions' => array(
			'Product.status' => 1, 
			'Product.cat_id' => $cat1
		),'limit'=>10,)
		);
    }
	
    // Cau hinh website
    public function setting() {
        $setting = $this->Setting->find('first');
        return $setting;
    }
    // Banner
     function banner() {
        return $this->Banner->find('all', array('conditions' => array('Banner.status' => 1), 'order' => 'Banner.id DESC', 'limit' => 1));
    }
  
	public function support() {
        $support = $this->Support->find('all', array(
            'conditions' => array(
           
                'Support.status' => 1
            ),
            'order' => 'Support.pos ASC',
                ));
        return $support;
    }
	 public function get_adv() {
        $support = $this->Slideshow->find('all', array(
            'conditions' => array(
           
                'Slideshow.status' => 1,
				'Slideshow.display' => 3,
            ),
            'order' => 'Slideshow.pos ASC',
			'limit'=>'10'
                ));
        return $support;
    }
	
	 public function phanhoi($id=110) {
        $support = $this->Tintuc->find('all', array(
            'conditions' => array(
           
                'Tintuc.status' => 1,
				'Tintuc.hot' =>1,
					'Tintuc.cat_id' =>$id,
            ),
            'order' => 'Tintuc.pos ASC',
			'limit'=>'3'
                ));
        return $support;
    }
	 public function phanhoi1($id=109) {
        $support = $this->Tintuc->find('all', array(
            'conditions' => array(
           
                'Tintuc.status' => 1,
				'Tintuc.hot' =>1,
				'Tintuc.cat_id' =>$id,
            ),
            'order' => 'Tintuc.pos ASC',
			'limit'=>'5'
                ));
        return $support;
    }
	 public function phanhoi2($id=111) {
        $support = $this->Tintuc->find('all', array(
            'conditions' => array(
           
                'Tintuc.status' => 1,
				'Tintuc.hot' =>1,
					'Tintuc.cat_id' =>$id,
            ),
            'order' => 'Tintuc.pos ASC',
			'limit'=>'5'
                ));
        return $support;
    }
}