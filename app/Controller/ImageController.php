<?php



/**

 * Description of ProductController

 * @author : Trung Tong

 * @since Oct 19, 2012

 */

class ImageController extends AppController {

    public $name = 'Image';

    public $uses = array('Listimage', 'Image');
	  public function beforeFilter() {
        parent::beforeFilter();
		  
       
    }
   public function index1($id = null) {

        $typeName = $this->Listimage->read(null, $id);

        $this->set('typeName', $typeName);
		  $this->set('title_for_layout', 'Album ảnh');
        $this->set('keywords_for_layout', $typeName['Listimage']['meta_key']);
        $this->set('description_for_layout', $typeName['Listimage']['meta_des']);
		$parmenu = $this->Listimage->find('list', array(
            'conditions' => array(
                'Listimage.parent_id' => $id,
                'Listimage.status' => 1
            )
                ));
		
		$mang=array();$i=0;
		$mang[$i++]=$id;
		foreach($parmenu as $key=>$value){
		$mang[$i++]=$key;
		}

		if($id!=null) {

        // list all Image

        $this->paginate = array(

            'conditions' => array(

                'Image.status' => 1,

                'Image.cat_id' => $mang

            ),

            'order' => 'Image.id DESC, Image.modified DESC',

        );

		

		}

		else {

		       $this->paginate = array(

            'conditions' => array(

                'Image.status' => 1,

                

            ),

            'order' => 'Image.id DESC, Image.modified DESC',

        );

		

		}

		

        $listImage = $this->paginate('Image');

        $this->set('listImage', $listImage);

	

		

    }

     public function index($id = null) {

        $typeName = $this->Listimage->read(null, $id);

 
		  $this->set('typeName', $typeName);
		  $this->set('title_for_layout', 'Album ảnh');
        $this->set('keywords_for_layout', $typeName['Listimage']['meta_key']);
        $this->set('description_for_layout', $typeName['Listimage']['meta_des']);
		$parmenu = $this->Listimage->find('list', array(
            'conditions' => array(
                'Listimage.parent_id' => $id,
                'Listimage.status' => 1
            )
                ));
		
		$mang=array();$i=0;
		$mang[$i++]=$id;
		foreach($parmenu as $key=>$value){
		$mang[$i++]=$key;
		}

		if($id!=null) {

        // list all Image

        $this->paginate = array(

            'conditions' => array(

                'Image.status' => 1,

                'Image.cat_id' => $mang

            ),

            'order' => 'Image.id DESC, Image.modified DESC',

            'limit' => '16'

        );

		

		}

		else {

		       $this->paginate = array(

            'conditions' => array(

                'Image.status' => 1,

                

            ),

            'order' => 'Image.id DESC, Image.modified DESC',

            'limit' => '6'

        );

		

		}

		

        $listImage = $this->paginate('Image');

        $this->set('listImage', $listImage);

		

		

    }

}