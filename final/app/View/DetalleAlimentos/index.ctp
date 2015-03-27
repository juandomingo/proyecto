<div class="detalleAlimentos index">
	<h2><?php echo __('Detalle Alimentos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alimento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_vencimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('stock'); ?></th>
			<th><?php echo $this->Paginator->sort('peso_unitario'); ?></th>
			<th><?php echo $this->Paginator->sort('reservado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($detalleAlimentos as $detalleAlimento): ?>
	<tr>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalleAlimento['Alimento']['id'], array('controller' => 'alimentos', 'action' => 'view', $detalleAlimento['Alimento']['id'])); ?>
		</td>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['fecha_vencimiento']); ?>&nbsp;</td>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['stock']); ?>&nbsp;</td>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['peso_unitario']); ?>&nbsp;</td>
		<td><?php echo h($detalleAlimento['DetalleAlimento']['reservado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detalleAlimento['DetalleAlimento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detalleAlimento['DetalleAlimento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detalleAlimento['DetalleAlimento']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $detalleAlimento['DetalleAlimento']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Detalle Alimento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alimentos'), array('controller' => 'alimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimento'), array('controller' => 'alimentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alimentos Pedidos'), array('controller' => 'alimentos_pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alimentos Pedido'), array('controller' => 'alimentos_pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
