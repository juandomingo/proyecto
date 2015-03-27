<div class="entidadReceptoras index">
	<h2><?php echo __('Entidad Receptoras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('razon_social'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('domicilio'); ?></th>
			<th><?php echo $this->Paginator->sort('latitud'); ?></th>
			<th><?php echo $this->Paginator->sort('longitud'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entidadReceptoras as $entidadReceptora): ?>
	<tr>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['id']); ?>&nbsp;</td>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['razon_social']); ?>&nbsp;</td>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['domicilio']); ?>&nbsp;</td>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['latitud']); ?>&nbsp;</td>
		<td><?php echo h($entidadReceptora['EntidadReceptora']['longitud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entidadReceptora['EntidadReceptora']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entidadReceptora['EntidadReceptora']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entidadReceptora['EntidadReceptora']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $entidadReceptora['EntidadReceptora']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Entidad Receptora'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
