<?php

class Product extends AppModel {

    public $name = 'Product';
    public $displayField = 'name';
	//public $actsAs = array('Translate' => array('name' => 'nameTranslation', 'shortdes' => 'shortdesTranslation', 'content' => 'contentTranslation'), 'Sluggable' => array('label' => 'name'));
    public $validate = array(
        'id' => array(
            'notempty' => array(
                'rule' => array('notempty')
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => false
            ),
        ),
        'cat_idi' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => false
            ),
        ),
    );
    public $belongsTo = array(
        'Catproduct' => array(
            'className' => 'Catproduct',
            'foreignKey' => 'cat_id'
        )
    );

}

?>
