<?php

class Post extends AppModel {

    public $name = 'Post';
    public $displayField = 'name';
    public $actsAs = array('Translate' => array('name' => 'nameTranslation', 'shortdes' => 'shortdesTranslation', 'content' => 'contentTranslation'));

}
?>
