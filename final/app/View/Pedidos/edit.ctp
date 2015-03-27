<div class="pedidos form">
<?php echo $this->Form->create('Pedido'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pedido'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('entidad_receptora_id');
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('estado_pedido_id');
		echo $this->Form->input('turno_entrega_id');
		echo $this->Form->input('con_envio');
		echo $this->Form->input('del');
		echo $this->Form->input('Alimento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pedido.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Pedido.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entidad Receptoras'), array('controller' => 'entidad_receptoras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entidad Receptora'), array('controller' => 'entidad_receptoras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estado Pedidos'), array('controller' => 'estado_pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado Pedido'), array('controller' => 'estado_pedidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turno Entregas'), array('controller' => 'turno_entregas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turno Entrega'), array('controller' => 'turno_entregas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos'), array('controller' => 'alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimento'), array('controller' => 'alimentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
