<?php

/**
 * Description of PartnerComtroller
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
   class PartnerController extends AppController {

    public $name = 'Partner';
    public $uses = array('Partner');

    public function index() {
	//echo "vao"; die;
        $this->paginate = array(
            'conditions' => array(
                'Partner.status' => 1               
            ),
            'order' => 'Partner.pos DESC, Partner.modified DESC',
            'limit' => '12'
        );
        $listPartner = $this->paginate('Partner');
        $this->set('listPartner', $listPartner);
    }

}