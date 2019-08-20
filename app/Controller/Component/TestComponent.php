<?php

/**
 * This is a Custom Component which will be included in all  Controllers
 */
class TestComponent extends Component
{

  public $controller = false;

  function __construct(ComponentCollection $collection, $settings)
  {
    $this->controller = $collection->getController();
  }

  public function copyright()
  {
    echo 'Copyright (c)';
  }


}
