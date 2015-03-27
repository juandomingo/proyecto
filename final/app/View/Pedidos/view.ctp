<div class="pedidos view">
<h2><?php echo __('Pedido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entidad Receptora'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['EntidadReceptora']['id'], array('controller' => 'entidad_receptoras', 'action' => 'view', $pedido['EntidadReceptora']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ingreso'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['fecha_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Pedido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['EstadoPedido']['id'], array('controller' => 'estado_pedidos', 'action' => 'view', $pedido['EstadoPedido']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Turno Entrega'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['TurnoEntrega']['id'], array('controller' => 'turno_entregas', 'action' => 'view', $pedido['TurnoEntrega']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Con Envio'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['con_envio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Del'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['del']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pedido'), array('action' => 'edit', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), array(), __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Alimentos'); ?></h3>
	<?php if (!empty($pedido['Alimento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pedido['Alimento'] as $alimento): ?>
		<tr>
			<td><?php echo $alimento['id']; ?></td>
			<td><?php echo $alimento['codigo']; ?></td>
			<td><?php echo $alimento['descripcion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alimentos', 'action' => 'view', $alimento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alimentos', 'action' => 'edit', $alimento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alimentos', 'action' => 'delete', $alimento['id']), array(), __('Are you sure you want to delete # %s?', $alimento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alimento'), array('controller' => 'alimentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
