<div class="alimentosPedidos form">
<?php echo $this->Form->create('AlimentosPedido'); ?>
	<fieldset>
		<legend><?php echo __('Edit Alimentos Pedido'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('detalle_alimento_id');
		echo $this->Form->input('pedido_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AlimentosPedido.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('AlimentosPedido.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Alimentos Pedidos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Detalle Alimentos'), array('controller' => 'detalle_alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Alimento'), array('controller' => 'detalle_alimentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
