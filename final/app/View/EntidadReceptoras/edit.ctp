<div class="entidadReceptoras form">
<?php echo $this->Form->create('EntidadReceptora'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entidad Receptora'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('razon_social');
		echo $this->Form->input('telefono');
		echo $this->Form->input('domicilio');
		echo $this->Form->input('latitud');
		echo $this->Form->input('longitud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EntidadReceptora.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('EntidadReceptora.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entidad Receptoras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
