<div class="detalleAlimentos form">
<?php echo $this->Form->create('DetalleAlimento'); ?>
	<fieldset>
		<legend><?php echo __('Add Detalle Alimento'); ?></legend>
	<?php
		echo $this->Form->input('alimento_id');
		echo $this->Form->input('contenido');
		echo $this->Form->input('fecha_vencimiento');
		echo $this->Form->input('stock');
		echo $this->Form->input('peso_unitario');
		echo $this->Form->input('reservado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Detalle Alimentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alimentos'), array('controller' => 'alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimento'), array('controller' => 'alimentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos Pedidos'), array('controller' => 'alimentos_pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimentos Pedido'), array('controller' => 'alimentos_pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
