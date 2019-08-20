<?php

class UsersController extends AppController {

	public function index()
	{
		$users = $this->User->find('all');
		debug($users);
		// $this->set(compact('users')); // you need to create a view
	}

	public function login()
	{
		// get user infos from session
		// debug($this->Session->read());
		// get user infos from User model
		// debug($this->Auth->user());
		// debug($this->Auth->user('id'));
		// debug(AuthComponent::user('id')); // this allows to call Auth out of Controllers

		if ($this->Session->read('Auth.User.id')){
			return $this->redirect('/');
		}

		if (!empty($this->request->data)){
			if ($this->Auth->login()){
				return $this->redirect('/posts');
			} else {
				$this->Session->setFlash('Login Failed.');
				return $this->redirect($this->referer());
			}
		}
	}

	public function logout()
	{
		$this->Auth->logout();
		return $this->redirect('/');
	}

	public function admin_login()
	{
		return $this->redirect('/users/login');
	}

	/*public function add()
	{
		// Create a User
    // $this->User->save(array(
		// 	'username' => 'admin',
		// 	'password' => $this->Auth->password('admin')
		// ));
    // $this->User->save(array(
		// 	'username' => 'user',
		// 	'password' => $this->Auth->password('user'),
		// 	'active' => 1,
		// 	'role' => 'user'
		// ));
		// die('user added.');
	}*/

	// just to allow 'auto' action
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login', 'auto', 'mail');

		// make login through Post only
		// $this->Security->requirePost('login');
		// make login require https
		// $this->Security->requireSecure('login');
	}

	// Auto connect user (comes handy if you want to connect user through social medias)
	public function auto()
	{
		$user = $this->User->find('first', array(
			'conditions' => array('User.role'=>'user')
		));
		if (!empty($user)){
			$this->Auth->login($user['User']);
			debug($this->Session->read());
			$this->render('/posts/index');
		}
	}

	public function mail()
	{
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail('default'); // or production
		// $email->from('');
		$email->to('cakeformation@yopmail.com');
		// $email->cc('cakeformation@yopmail.com'); //copy
		// $email->bcc('cakeformation@yopmail.com'); // hidden copy
		// $email->replyTo('cakeformation@yopmail.com'); // reply
		// $email->messageId('123456');
		$email->subject('Formation CakePHP gratuit');
		// $email->attachements(array('/path/to/file/image.png'));
		$email->viewVars(array('username' => 'Ali'));
		$email->template('welcome', 'default');
		// $email->emailFormat('text');
		$email->emailFormat('html');
		// $email->emailFormat('both');
		$email->message('Ceci est un email de test');
		// $email->send('Ceci est un email de test');
		$email->send();
		// $email->layout('');
		die('sent.');
	}

}
