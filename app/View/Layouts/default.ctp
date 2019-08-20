<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<!-- Load a title content form the child view file -->
	<title>
		<?php //echo $title_for_layout; ?>
		<?= $this->fetch('title') ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		/* Add CSS files */
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('mystyle');

		// add to meta block by specifying "inline"=>true
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Hello <?=$this->Html->link('CakePHP', 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

			<?= $this->fetch('sidebar')
			?>
		</div>
		<div id="footer">
			<?=$this->Html->image('cake.power.gif', array('alt' => 'CakePHP Demo', 'border' => '0')) ?>
		</div>
	</div>
	<?= $this->Html->script('myscript'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
