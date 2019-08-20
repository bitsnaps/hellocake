<?php $this->extend('template') ?>

<h2>Hello CakePHP!</h2>
<?php if (!empty($prenom)): ?>
<p>Hello <?=$prenom ?></p>
<?php endif ?>

<h1>hi</h1>

<?php
$this->assign('title', 'Hello CakePHP');
?>

<!-- add to the meta tag some extra description (e.g. for SEO) -->
<?php $this->Html->meta('description', 'My home page', array('inline' => false)); ?>


<!-- this part is inherited from the template.ctp -->
<?php $this->start('header') ?>
<h2>Menu</h2>
<!-- full url -->
<?php //echo $this->Html->link('home', true) ?>
<?php //echo $this->Html->link('<b>Home</b>', '/', array('escape' => false)) ?>
<?php //echo $this->Html->image('favicon.png') ?>
<?php //echo $this->Html->nestedList(array('a', array('b', 'c'))) ?>

<?php $this->end() ?>

<?php $this->start('sidebar'); ?>

<!-- Html Helpers -->
<?= $this->Placeholder->image(350, 150) ?>

<div class="row">
  <a class="btn btn-primary" href="<?= $this->Html->url('/posts/add') ?>">Add a Post</a>
</div>
<div class="row">
  <a class="btn btn-success" href="<?= $this->Html->url('/admin') ?>">Administration</a>
</div>

<h3>Sidebar</h3>
<p>Sidebar content...</p>

<?php $this->end(); ?>

<!-- put css/js at the proper place (null refer to relation: rel) -->
<?php $this->Html->css('mystyle2', null, array('inline' => false )); ?>
<?php $this->Html->script('myscript2', array('inline' => false )); ?>


<?php $this->Html->scriptStart(array('inline' => false)) ?>
  console.log('script block');
<?php $this->Html->scriptEnd() ?>
