<div class="alimentosPedidos view">
<h2><?php echo __('Alimentos Pedido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alimentosPedido['AlimentosPedido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($alimentosPedido['AlimentosPedido']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detalle Alimento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alimentosPedido['DetalleAlimento']['id'], array('controller' => 'detalle_alimentos', 'action' => 'view', $alimentosPedido['DetalleAlimento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pedido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alimentosPedido['Pedido']['id'], array('controller' => 'pedidos', 'action' => 'view', $alimentosPedido['Pedido']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alimentos Pedido'), array('action' => 'edit', $alimentosPedido['AlimentosPedido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alimentos Pedido'), array('action' => 'delete', $alimentosPedido['AlimentosPedido']['id']), array(), __('Are you sure you want to delete # %s?', $alimentosPedido['AlimentosPedido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos Pedidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimentos Pedido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalle Alimentos'), array('controller' => 'detalle_alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Alimento'), array('controller' => 'detalle_alimentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
