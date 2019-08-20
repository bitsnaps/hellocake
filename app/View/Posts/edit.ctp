<?php
$this->assign('title', 'Edit a Post');
?>

<!-- update form -->
<?php //echo $this->Form->create('Post', array('type'=>'get')) ?>
<!-- block submit (handy for ajax) -->
<?php //echo $this->Form->create('Post', array('type'=>'get', 'default' => false)) ?>
<?php //echo $this->Form->create('Post', array('type'=>'file')) ?>
<?php //echo $this->Form->inputDefaults( array('label'=>'test')) ?>
<?php echo $this->Form->create('Post') ?>
<?php echo $this->Form->input('id') ?><!-- auto hidden id -->
<?php echo $this->Form->input('name', array('label' => 'Post Name', 'placeholder'=>'Enter a Post Name')) ?>
<?php //echo $this->Form->input('0.name') ?>
<?php //echo $this->Form->input('1.name') ?><!-- same name different index -->
<?php echo $this->Form->input('slug', array('label' => 'Slug')) ?>
<?php echo $this->Form->input('category.id', array('label' => 'Category','options'=>$categories)) ?>
<?php //echo $this->Form->input('categories', array('label' => 'Category')) ?><!-- auto detect (plural name) -->
<?php //echo $this->Form->input('tags', array('label' => 'Tags', 'multiple' => true)) ?>
<?php echo $this->Form->input('tags', array('label' => 'Tags', 'multiple' => 'checkbox')) ?>
<?php echo $this->Form->input('content', array('label' => 'Content')) ?>
<?php echo $this->Form->input('created', array('label' => 'Date', 'type'=>'text')) ?>
<?php echo $this->Form->input('avatar', array('label' => false, 'type'=>'file')) ?>
<?php echo $this->Form->end('Save'); ?>

<p>Back to <a href="<?=$this->Html->url(array('controller' => 'posts', 'action' => 'index')) ?>">Home </a></p>
