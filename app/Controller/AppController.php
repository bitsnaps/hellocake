<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  // You can use components for managing Session, Cookie...
  public $components = array(
    'Session', // Session manager
    'Cookie', // Cookie manager
    'Test' => array(''), // custom created in TestComponent with empty settings
    'Email', // CakeEmail (deprecated)
    // 'Paginate', // managing pagination
    // Auth Component need Session Component to be active
    'Auth' => array( // Authentication Manager (default fields: 'username', 'password')
      // 'loginAction' => array('controller' => 'users', 'action' => 'login') // custom login action
      'authenticate' => array( // optional parameters
        'Form' => array(
          // 'fields' => array('username' => 'mail', 'password' => 'pass'), // custom fields
          'scope' => array('User.active' => 1) // custom conditions
        )
      ),
      // Simple Role Based Authorizartion ('Controller' requires to define isAuthorized() action)
      'authorize' => array('Controller') // or 'ActionsAuthorize', 'CrudAuthorize', more: https://book.cakephp.org/2.0/en/core-libraries/components/authentication.html
    ),
    // secure forms, csrf...
    'Security' => array(
      // true if you want to allow multiple post using the same csrf token
      // 'csrfUseOnce' => false,
      // 'csrfExpires' => '+30 minutes', // 30 minutes by default
      // 'csrfCheck' => true, // false if you wan to disable csrf check
      // 'blackHoleCallback' => 'blackhole' // custom security black-hole error message
    )
  );

  // Generic filter for all Controllers
  public function beforeFilter()
  {
    parent::beforeFilter();
    // $session = $this->Session->read();
    // $session = $this->Session->read('Config.time');
    // $isLoggedIn = $this->Session->check('Auth.User.id');
    // $this->Session->write('User.id','1');
    // $this->Session->delete('user');
    // $this->Session->destroy(); // delete everything
    // debug($session);

    /*/ Cookies are encrypted, so you cannot directly read from $_COOKIE
    $cookie = $this->Cookie->read();
    // $this->Cookie->write('User.id','1');
    // $cookie = $this->Cookie->read('User.id');
    // $this->Cookie->delete('User.id');
    // $this->Cookie->name = 'WebSiteName';
    // $this->Cookie->time = 3600; // or 1 hour
    // $this->Cookie->path = '/';
    // $this->Cookie->domain = '.domain.com';
    // $this->Cookie->secure = true;
    // $this->Cookie->key = '87TH0G874H078EHF4087H4087RY4ZF9ZH9E';
    // $this->Cookie->httpOnly = true;
    //debug($cookie);*/

    $menu = 'Home';
    $this->set(compact('menu'));
  }

  // Custom authorization action
  public function isAuthorized($user = null)
  {
    return true;
  }


  public function blackhole($type)
  {
    debug("Black Hole Error: " .$type);
    // die();
  }


}
