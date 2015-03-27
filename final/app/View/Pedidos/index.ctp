<div class="pedidos index">
	<h2><?php echo __('Pedidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('entidad_receptora_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ingreso'); ?></th>
			<th><?php echo $this->Paginator->sort('estado_pedido_id'); ?></th>
			<th><?php echo $this->Paginator->sort('turno_entrega_id'); ?></th>
			<th><?php echo $this->Paginator->sort('con_envio'); ?></th>
			<th><?php echo $this->Paginator->sort('del'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidos as $pedido): ?>
	<tr>
		<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedido['EntidadReceptora']['id'], array('controller' => 'entidad_receptoras', 'action' => 'view', $pedido['EntidadReceptora']['id'])); ?>
		</td>
		<td><?php echo h($pedido['Pedido']['fecha_ingreso']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedido['EstadoPedido']['id'], array('controller' => 'estado_pedidos', 'action' => 'view', $pedido['EstadoPedido']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pedido['TurnoEntrega']['id'], array('controller' => 'turno_entregas', 'action' => 'view', $pedido['TurnoEntrega']['id'])); ?>
		</td>
		<td><?php echo h($pedido['Pedido']['con_envio']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['del']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pedido['Pedido']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pedido['Pedido']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pedido['Pedido']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedido['Pedido']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pedido'), array('action' => 'add')); ?></li>
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
