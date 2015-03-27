<div class="detalleAlimentos view">
<h2><?php echo __('Detalle Alimento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alimento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalleAlimento['Alimento']['id'], array('controller' => 'alimentos', 'action' => 'view', $detalleAlimento['Alimento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Vencimiento'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['fecha_vencimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['stock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso Unitario'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['peso_unitario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservado'); ?></dt>
		<dd>
			<?php echo h($detalleAlimento['DetalleAlimento']['reservado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalle Alimento'), array('action' => 'edit', $detalleAlimento['DetalleAlimento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detalle Alimento'), array('action' => 'delete', $detalleAlimento['DetalleAlimento']['id']), array(), __('Are you sure you want to delete # %s?', $detalleAlimento['DetalleAlimento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalle Alimentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle Alimento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos'), array('controller' => 'alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimento'), array('controller' => 'alimentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos Pedidos'), array('controller' => 'alimentos_pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimentos Pedido'), array('controller' => 'alimentos_pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alimentos Pedidos'); ?></h3>
	<?php if (!empty($detalleAlimento['AlimentosPedido'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Detalle Alimento Id'); ?></th>
		<th><?php echo __('Pedido Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($detalleAlimento['AlimentosPedido'] as $alimentosPedido): ?>
		<tr>
			<td><?php echo $alimentosPedido['id']; ?></td>
			<td><?php echo $alimentosPedido['cantidad']; ?></td>
			<td><?php echo $alimentosPedido['detalle_alimento_id']; ?></td>
			<td><?php echo $alimentosPedido['pedido_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alimentos_pedidos', 'action' => 'view', $alimentosPedido['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alimentos_pedidos', 'action' => 'edit', $alimentosPedido['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alimentos_pedidos', 'action' => 'delete', $alimentosPedido['id']), array(), __('Are you sure you want to delete # %s?', $alimentosPedido['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alimentos Pedido'), array('controller' => 'alimentos_pedidos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
