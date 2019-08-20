<?php


class Category extends AppModel {

  // public $hasMany = array('Post');
  public $hasMany = array('Post' => array('dependent' => true));
  // customize fields retreived in the joins
  // public $hasMany = array('Post' => array(
  //   'fields' => array('Post.name')
  // ));

  // Plug SlugBehavior (Containable from AppModel)
  public $actsAs = array('Slug');


}
