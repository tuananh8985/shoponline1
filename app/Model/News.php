<?php

class News extends AppModel {

    var $name = 'News';
    var $displayField = 'name';
     public $actsAs = array('Tree','Translate' => array('name' => 'nameTranslation', 'shortdes' => 'shortdesTranslation', 'content' => 'contentTranslation'));
  
}

?>
