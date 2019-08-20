<?php

/**
 * Model in Singular (table in the db in plural)
 */
class Post extends AppModel {

  // public $useTable = 'tableName';

  // Relationship
  // public $belongsTo = array('Category');
  public $belongsTo = array(
    'Category' => array(
      'className' => 'Category',
      'foreignKey' => 'category_id',
      'fields' => 'Category.name', // get only certain fields
    )
    //, if you want count post you can create post_count field in categories table then add:
    //'counterCache' => true,
  );

  // we'll create $hasAndBelongsToMany in the Tag model as well
  public $hasAndBelongsToMany = array('Tag');

  // many-to-many RelationShip
  public $hasMany = 'PostTag';

  // Plug SlugBehavior (Containable moved to AppModel)
  public $actsAs = array(/*'Containable', */'Slug');
  // Apply to certain field (useful to customize Behavior)
  // public $actsAs = array('Slug', array(
  //   'field' => 'slug2'
  // ));

  // Validations (https://book.cakephp.org/2.0/en/models/data-validation.html)
  public $validate = array(
    // 'FIELD_NAME' => 'VALIDATION_RULE'
    // 'url' => 'url',
    'name' => array(
      'rule' => 'notEmpty',
      'required' => true,
      'allowEmpty' => false,
      'on' => 'create', // or 'update'
      'message' => 'You entered a wrong name.'
    ),
    // custom validation rule
    'content' => 'myContentRule'
  );

  public function myContentRule($check)
  {
    return !empty($check);
  }

  public function createPost($name, $slug, $content)
  {
    $this->create(); // forget the last ID
    $this->save(array(
      'name' => $name,
      'slug' => $slug,
      'content' => $content
    ));
  }

  /*/ moved to SlugBehavior
  public function beforeSave($options = array())
  {
    //debug($this->options)
    //debug($this->data)
    if (isset($this->data[$this->alias]['name']) &&
        empty($this->data[$this->alias]['slug'])){
      $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'], '-'));
    }
  }

  // moved to SlugBehavior
  public function afterFind($results, $primary = false)
  {
    foreach ($results as $key => $result) {
      if (empty($result[$this->alias]['slug'])){
        $results[$key][$this->alias]['slug'] = strtolower(Inflector::slug($result[$this->alias]['name'], '-'));
      }
    }
    return $results;
  }*/

}
