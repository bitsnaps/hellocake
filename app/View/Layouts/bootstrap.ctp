<!DOCTYPE html>
<html>
<head>
	<!-- Load a title content form the child view file -->
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $title_for_layout; ?>
		<?= $this->fetch('title') ?>
	</title>

	<?=$this->fetch('meta') ?>

	<?php
		echo $this->Html->meta('icon');

		/* Add CSS files */
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('mystyle');

		// add to meta block by specifying "inline"=>true
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Hello <?=$this->Html->link('CakePHP', 'http://cakephp.org') ?> - <?= $menu ?></h1>
		</div>
		<div id="content">
			<?php if ($this->Session->check('Auth.User.id')): ?>
			 <?= $this->Html->link('Logout ('.AuthComponent::user('username').')', array('controller' => 'users', 'action'=>'logout'))?>
			<?php else: ?>
				<?= $this->Html->link('Login', array('controller' => 'users', 'action'=>'login'))?>
			<?php endif ?>


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

			<?php echo $this->fetch('sidebar'); ?>

		</div>
		<div id="footer">
			<?=$this->Html->image('cake.power.gif', array('alt' => 'CakePHP Demo', 'border' => '0')) ?>
		</div>

	</div>
<!-- default script file -->
<?php echo $this->fetch('script'); ?>

<!-- my custom script file -->
<?= $this->Html->script('myscript'); ?>

<!-- CakePHP sql dump debug -->
<?php echo $this->element('sql_dump'); ?>

</body>
</html>
