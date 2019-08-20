<ul class="main-menu">
  <li><?=$this->Html->link('Home', '/')?></li>
  <li><?=$this->Html->link('admin', '/admin')?></li>
  <li><?=$this->Html->link('New Post', '/add')?></li>
  <li><?=$this->Html->link('Comments', '/comments')?></li>
</ul>
<hr>

<div class="header">
  <?= $this->fetch('header'); ?>
</div>
