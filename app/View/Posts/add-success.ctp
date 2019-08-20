<h2>Hello CakePHP!</h2>

<?php
$this->assign('title', 'Hello CakePHP');
?>

<?php $this->Html->css('mystyle2', null, array('inline' => false )); ?>
<?php $this->Html->script('myscript2', array('inline' => false )); ?>
<h1>Bravo Post Created.</h1>

<p>
  <a href="<?= $this->Html->url(array('action' => 'view', 'id' =>$id), true) ?>">View</a>
</p>
