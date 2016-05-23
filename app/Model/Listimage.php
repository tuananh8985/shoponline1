<?php

class Listimage extends AppModel {

    var $name = 'Listimage';
    var $displayField = 'name';
     public $actsAs = array('Tree', 'Translate' => array('name' => 'nameTranslation', 'shortdes' => 'shortdesTranslation', 'content' => 'contentTranslation'));

}

?>
