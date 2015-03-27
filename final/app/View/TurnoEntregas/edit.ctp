<div class="turnoEntregas form">
<?php echo $this->Form->create('TurnoEntrega'); ?>
	<fieldset>
		<legend><?php echo __('Edit Turno Entrega'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('hora');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TurnoEntrega.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TurnoEntrega.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Turno Entregas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
