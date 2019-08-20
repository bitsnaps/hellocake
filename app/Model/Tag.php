<?php

class Tag extends AppModel {

  // for that we must create posts_tags table
  public $hasAndBelongsToMany = array('Post');


}
