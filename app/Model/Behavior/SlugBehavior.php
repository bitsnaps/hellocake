<?php

/**
 * SlugBehavior
 */
class SlugBehavior extends ModelBehavior{

  // Customize Behavior with settings
  public function setup(Model $Model, $settings = array())
  {
    // settings are indexed for each model
    if (!isset($this->settings[$Model->alias])){
      $this->settings[$Model->alias] = array(
        'field' => 'slug',
        'separator' => '-'
      );
    }
    $this->settings[] = array_merge($this->settings[$Model->alias], $settings);
  }

  public function beforeSave(Model $Model, $options = array())
  {
    $slugField = $this->settings[$Model->alias]['field'];
     if (isset($Model->data[$Model->alias]['name']) &&
        (!isset($Model->data[$Model->alias][$slugField]) ||
        empty($Model->data[$Model->alias][$slugField]))){
      $Model->data[$Model->alias][$slugField] = strtolower(Inflector::slug(
        $Model->data[$Model->alias]['name'], $this->settings[$Model->alias]['separator']));
    }
  }

  // moved to SlugBehavior
  public function afterFind(Model $Model, $results, $primary = false)
  {
    foreach ($results as $key => $result) {
      if (!empty($results[$key][$Model->alias]['slug'])){
        if (empty($result[$Model->alias]['slug'])){
          $results[$key][$Model->alias]['slug'] = strtolower(Inflector::slug($result[$Model->alias]['name'], '-'));
        }
      }
    }
    return $results;
  }

  public function listSlugs(Model $Model)
  {
    return $Model->find('list', array(
      'fields' => array('id', $this->settings[$Model->alias]['field'], 'name')
    ));
  }

}
