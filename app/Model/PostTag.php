<?php

class PostTag extends AppModel {

  public $useTable = 'posts_tags';
  // very helpful to make querying joins easy (e.g. $this->Post->PostTag->find('all',...))
  public $belongsTo = array('Post','Tag');

}
