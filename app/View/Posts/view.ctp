<?php
$this->assign('title', 'View a Post');
?>

<!-- Use of element (name, args, params ) -->
<?= $this->element('rightbar', array('post' => $post)) ?>

<!-- use cache for better performance -->
<?php /*echo $this->element('rightbar', array('post' => $post), array(
  'cache' => array('duration' => 3600*24)
)); */ ?>
<!-- you can configure the cache in bootstrap.php file -->
<?php /* echo $this->element('rightbar', array('post' => $post), array(
  'cache' => array('config' => 'short')
  // cache can have  a key, useful in case you a cache differently for each view
  //'cache' => array('config' => 'short', 'key' => 'cache1')
))*/ ?>

<!-- update form -->
<?php echo $this->Form->create('Post') ?>
<?php echo $this->Form->input('name', array('label' => 'Post Name', 'readonly' => true, 'value' => $post['Post']['name'], 'placeholder'=>'Enter a Post Name')) ?>
<?php echo $this->Form->input('slug', array('label' => 'Slug', 'readonly' => true, 'value' => $post['Post']['slug'])) ?>
<?php echo $this->Form->input('content', array('label' => 'Content', 'readonly' => true, 'value' => $post['Post']['content'])) ?>

<p>Back to <a href="<?=$this->Html->url(array('controller' => 'posts', 'action' => 'index')) ?>">Home </a></p>
