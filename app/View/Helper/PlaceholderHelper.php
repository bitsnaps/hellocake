<?php

/**
 * Placeholder helper
 */
class PlaceholderHelper extends AppHelper {

  public $helpers = array('Html');
  public $settings = array(
    'url' => 'https://via.placeholder.com/%sx%s'
  );

  function __construct(View $View, $settings = array())
  {
    parent::__construct($View, $settings);
    $this->settings = array_merge($this->settings, $settings);
  }


  public function image($width, $height)
  {
    return $this->Html->image(sprintf($this->settings['url'], $width, $height));
  }

/*
// can be called from a view using:
<?= $this->Placeholder->test() ?>
*/
  public function test()
  {
    debug($this->request->data);
    // check...
  }

}
