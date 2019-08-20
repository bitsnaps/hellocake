<div class="row">

<h1>Connexion</h1>

<p><?= $this->Session->flash('auth') ?></p>	

<?= $this->Form->create('User')?>
	<!-- avoid black-hold error due to the use of security component in case you want to allow modify a field manually (e.g. js) -->
	<?php //echo $this->Form->unlockField('User.id')?>
	<?= $this->Form->input('username', array('label' => 'User Name'))?>
	<?= $this->Form->input('password', array('label' => 'Password'))?>
<?= $this->Form->end('Connexion')?>

</div>
