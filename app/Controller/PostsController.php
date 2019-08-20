<?php

class PostsController extends AppController {

  // here we use Paginate Component (already used in the CakePHP's Controllers)
  // public $components = array('Paginator');

  public $paginate = array(
    'limit' => 5,
    'order' => 'Post.created DESC',
    'contain' => array('Category', 'Tag'),
    'paramType' => 'querystring'
  );

  // Helpers
  public $helpers = array('Placeholder');
  // public $helpers = array('Placeholder' => array(
  //   'url' => 'http://placekitten.com/%s/%s'
  // ));

  public function index($prenom = '')
  {

    // Debugging...
    // debug($this->request);
    // debug($this->request->pass);
    // debug($this->request->query);
    // debug($this->response);


    // change header location
    // debug($this->response->header('location', 'http://www.google.com'));
    // debug($this->response->send());

    // file download
    // debug($this->response->download('file.txt'));
    // debug($this->response->send());
    // die('here is a file.txt content');

    // die with a message
    //die( "Hi $prenom " );
    //return 'home';

    // send a var to the view
    $this->set('prenom', empty($prenom)?'':$prenom);

    // default layout
    $this->layout = 'bootstrap'; //'default';

    //debug($this->Post);

    // Model finders
    // debug( $this- >Post->find('first') );
    // debug( $this->Post->find('list') );
    // debug( $this->Post->find('all') );
    // debug($this->Post->find('count'));

    // Detailed Query
    // debug( $this->Post->find('all', array(
    //   'fields' => array('Post.id', 'Post.name') ,
    //   'conditions' => array('Post.slug LIKE ' => 'salut%'),
    //   'order' => array('Post.id DESC')
    //   )));

    // Raw Query
    // debug( $this->Post->query('SELECT * FROM posts') );

    // Work on one record
    // $this->Post->id = 2;
    // Read from one field
    //debug($this->Post->field('slug'));
    // Read from multiple fields
    //debug($this->Post->read('Post.id, Post.slug'));

    // Finders
    // debug($this->Post->findById(2));
    //debug($this->Post->findAllBySlug('salut-tout-monde')); // returns array
    // debug($this->Post->findAllBySlug('salut-tout-monde', array('Post.id, Post.name')));

    // Create & Save
    // $this->Post->save( array(
    //   'name' => 'mon article1',
    //   'slug' => 'mon-article1',
    //   'content' => 'Mon contenu'
    // ) );

    // Update
    // $this->Post->save( array(
    //   'id' => 4,
    //   'name' => 'mon article2',
    //   'slug' => 'mon-article2',
    //   'content' => 'Mon contenu2'
    // ));

    // Update one row
    // $this->Post->id = 4;
    // $this->Post->saveField('slug', 'mon-article3');

    // Delete a row
    // $this->Post->delete(4);
    // Delete many
    // $this->Post->deleteAll(true);
    // $this->Post->deleteAll(array('content lIKE '=> '%salut%'));

    // Custom action (creatd in Post class)
    // $this->Post->createPost('Mon Article 5', 'mon-article5', 'Ceci est mon article N°5.');
    // get ID of the last created element
    // debug($this->Post->id);

    // debug($this->Post->find('all'));
    // die('');

  }

  // Create CRUD operations for Post Model
  //public $scaffold;

  public function add(){
    // Make sure the browser is sending a POST request
    if ($this->request->is('post')){
      // debug($this->request->data);
      // Check if the name already exists
      $name = $this->Post->findByName($this->request->data['Post']['name']);
      if (empty($name)){
        $this->Post->create($this->request->data, true);
        // data is validated using model rules
        if ($this->Post->validates() && $this->Post->save(null, true, array('name'))){
          $id = $this->Post->id;
          $this->set('id', $id);
          $this->render('add-success');
        }
        // You can also use dynamic validation rules (version >= 2.2)
        // $validator = $this->Post->validator();
        // $validator->remove('fieldName');
        // $validator->remove('fieldName', 'ruleName');
        // $validator->add('fieldName', 'ruleName', array('allowEmpty'=>true, ...));
        // $validator->getField('fieldName')->getRule('ruleName')->message = 'Error...';
        // $validator->getField('fieldName')->setRule('ruleName2', array('required'=>false, ...));
      } else {
        // die('Post already exists.');
        $id = $name['Post']['id'];
        $this->set('id', $id);
        // or
        // $this->set(compact('id'));
        $this->render('add-success');
      }
    }
  }

  public function view($id = 0)
  {
    $id = $this->request->id;
    $post = $this->Post->findById($id);
    if (empty($post)){
      throw new NotFoundException();
    }
    // $this->redirect($post['Post']['id'], 301);
    $this->set('post', $post);
    $this->render('view');
  }

  public function admin_index()
  {
    // $posts = $this->Post->find('all');
    /*$posts = $this->Post->find('all', array(
      'fields' => '*',
      'joins' => array(
        array(
          'table' => 'categories',
          'alias' => 'Category',
          'type' => 'LEFT',
          'conditions' => array('Category.id = Post.category_id')
        )
      )
    ));*/
/*    $posts = $this->Post->find('all', array(
      'recursive' => 0 //-1 no joins, 0 for left joins, 1 left joins + relations asMany + asBelongsToMany, 2 deep querying
    ));*/

    // retreive categories through Post
    // $categories = $this->Post->Category->find('all');
    // or
    // $this->loadModel('Category');
    // $categories = $this->Category->find('all');

    // Save both Post & Category
    /*$data = array(
      'Post' => array(
        'name' => 'new post 9',
        'content' => 'Content for post 9'
      ),
      'Category' => array(
        'name' => 'Sport',
        'slug' => 'sport'
      )
    );
    $this->Post->saveAssociated($data);*/

    // delete in Cascade
     // $this->Post->Category->delete(3); // associated posts will be deleted

     // save posts with tags
     /*$this->Post->Tag->save(array(
       'Post' => array('id' => 2),
       'Tag' => array('name' => 'national')
     ));
     $this->Post->Tag->create();
     $this->Post->Tag->save(array(
       'Post' => array('id' => 2),
       'Tag' => array('name' => 'public')
     ));*/

     // delete from many-to-many relationShip
     // $this->Post->PostTag->delete(2);

     // listSlugs defined in SlugBehavior
     // $slugs = $this->Post->listSlugs();
    // debug($slugs);

    // $id = $this->Post->id;

    /*/ Containable (built-in Behavior)
    $posts = $this->Post->find('all', array(
      'contain' => array('Category') // join only with categories table
      // 'contain' => array('Tag.name')
      // 'contain' => array('Tag.name', 'Category.name')
      // 'contain' => array() // no joins
    ));
    // filter with Containable Behavior (conditions, order...)
    $this->Post->contain('Tag.name = "public"');
    $posts = $this->Post->find('all');
     */
    // debug($posts);
    // die('');

    // using Paginator Component
    $posts = $this->paginate('Post');
    $this->set(compact('posts'));
    // from TestComponent
    // echo $this->Test->copyright();
  }

  // Using Filters: beforeFilter
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->set('menu', 'Posts');

    // Auth Component
    // $this->Auth->allow(); // allow access to everything
    $this->Auth->allow('index'); // allow access to certain action
    // $this->Auth->allow('index', 'add'); // allow access to certains actions
    // $this->Auth->deny('admin_index'); // deny access to certains actions

  }

  // Using Filters: beforeRender
  public function beforeRender()
  {
    parent::beforeRender();
    // debug($this->viewVars);
  }

  // Custom authorization action (should be defined in AppController as well)
  public function isAuthorized($user = null)
  {
    parent::isAuthorized($user);
    $canAccess = $user['role'] == 'admin';
    if (!$canAccess){
      $this->Session->setFlash('You are not allowed to access this page.', 'alert', array(
        'class' => 'alert-danger'
      ));
    }
    return $canAccess;
  }

  public function getCountPosts()
  {
    return $this->Post->find('count');
  }


  public function edit($id = false)
  {
    if (empty($this->request->data) && $id){
      $this->Post->contain('PostTag'); // get related tags
      $this->request->data = $this->Post->findById($id);
      // $this->request->data['Post']['tags'] = array(1,2); // manual set tags
      $this->request->data['Post']['tags'] = array();
      foreach ($this->request->data['PostTag'] as $tag) {
        $this->request->data['Post']['tags'][] = (int) $tag['id'];
      }
    } else {
      $this->Post->create($this->request->data);
      if ($this->Post->save()){
        $tags = $this->request->data['Post']['tags'];
        $this->Post->PostTag->deleteAll(array('post_id' => $this->Post->id));
        foreach ($tags as $tag_id) {
          $this->Post->PostTag->create(array(
            'tag_id' => $tag_id,
            'post_id' => $this->Post->id
          ));
          $this->Post->PostTag->save();
        }
      }
      // $this->Post->validates();
    }
    $categories = $this->Post->Category->find('list');
    $tags = $this->Post->Tag->find('list');

    $this->set(compact('categories', 'tags'));
  }
}
