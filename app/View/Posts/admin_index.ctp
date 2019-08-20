<?php $this->extend('template'); ?>

<?php $this->assign('title', 'Administration'); ?>

<!-- this part is inherited from the template.ctp -->
<?php $this->start('header') ?>
<h2>List of Posts</h2>
<?php $this->end() ?>


<?php $this->start('sidebar'); ?>
<ul>
<?php foreach ($posts as $p => $post): ?>
  <li><?=$this->Html->link($post['Post']['name'], '/view/'.$post['Post']['id']) ?> (<i><?= $post['Post']['slug'] ?></i>) in <strong>
    <?= $post['Category']['name'] ?></strong>, tags: <i><?php
    if (count($post['Tag'])>0){
      $tags = array();
      foreach ($post['Tag'] as $key => $tag) {
        array_push($tags, $tag['name']);
      }
      echo join(',', $tags);
    } else {
      echo '(no tags)';
    }
     ?></i></li>
<?php endforeach ?>
</ul>
<?= $this->Paginator->prev('Previous') ?>|<?= $this->Paginator->numbers() ?>|<?= $this->Paginator->next('Next') ?>

<?php $this->end(); ?>
