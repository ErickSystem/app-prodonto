<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<legend><?php __('Edit Usuario'); ?></legend>
	<?php
		echo $this->Form->input('idUsuario');
		echo $this->Form->input('Nome');
		echo $this->Form->input('Login');
		echo $this->Form->input('passwd');
		echo $this->Form->input('email');
		echo $this->Form->input('permissao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Usuario.idUsuario')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Usuario.idUsuario'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios', true), array('action' => 'index'));?></li>
	</ul>
</div>