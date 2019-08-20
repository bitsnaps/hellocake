<!-- Right Menu -->
<?php if (!empty($post)): ?>
<h2>Post ID: <?= $post['Post']['id'] ?></h2>
<?php else: ?>
<h2>Create a new Post</h2>
<?php endif ?>

<!-- requestAction may decrease performance, you'd better to use cache -->
<?php $count = $this->requestAction(array('controller'=>'posts', 'action'=>'getCountPosts')) ?>
<p>
  Total Posts: <?= $count ?>
</p>
