<?php

class Image extends AppModel {

    var $name = 'Image';
    var $displayField = 'name';
    //var $actsAs = array('Translate' => array('name', 'shortdes', 'content'));
  public $actsAs = array('Translate' => array('name' => 'nameTranslation', 'shortdes' => 'shortdesTranslation', 'content' => 'contentTranslation'));

}
?>
