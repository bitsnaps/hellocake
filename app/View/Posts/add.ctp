<?php
$this->assign('title', 'Create a Post');
?>

<!-- Use of element (name, args, params ) -->
<?= $this->element('rightbar') ?>

<!-- create a form -->
<?php echo $this->Form->create('Post') ?>
<?php echo $this->Form->input('name', array('label' => 'Post Name', 'placeholder'=>'Enter a Post Name')) ?>
<?php echo $this->Form->input('slug', array('label' => 'Slug')) ?>
<?php echo $this->Form->input('content', array('label' => 'Content')) ?>
<?php echo $this->Form->end('Save Post') ?>
