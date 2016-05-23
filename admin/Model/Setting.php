<?php

class Setting extends AppModel {

    var $name = 'Setting';
    var $displayField = 'name';
   public $actsAs = array('Translate' => array('name' => 'nameTranslation','address'=>'addressTranslation','contactinfo'=>'contactinfoTranslation'));
    
}

?>
