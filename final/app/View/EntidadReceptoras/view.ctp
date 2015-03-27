<div class="entidadReceptoras view">
<h2><?php echo __('Entidad Receptora'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razon Social'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Domicilio'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['domicilio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['latitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($entidadReceptora['EntidadReceptora']['longitud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entidad Receptora'), array('action' => 'edit', $entidadReceptora['EntidadReceptora']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entidad Receptora'), array('action' => 'delete', $entidadReceptora['EntidadReceptora']['id']), array(), __('Are you sure you want to delete # %s?', $entidadReceptora['EntidadReceptora']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entidad Receptoras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entidad Receptora'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pedidos'); ?></h3>
	<?php if (!empty($entidadReceptora['Pedido'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Entidad Receptora Id'); ?></th>
		<th><?php echo __('Fecha Ingreso'); ?></th>
		<th><?php echo __('Estado Pedido Id'); ?></th>
		<th><?php echo __('Turno Entrega Id'); ?></th>
		<th><?php echo __('Con Envio'); ?></th>
		<th><?php echo __('Del'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entidadReceptora['Pedido'] as $pedido): ?>
		<tr>
			<td><?php echo $pedido['id']; ?></td>
			<td><?php echo $pedido['entidad_receptora_id']; ?></td>
			<td><?php echo $pedido['fecha_ingreso']; ?></td>
			<td><?php echo $pedido['estado_pedido_id']; ?></td>
			<td><?php echo $pedido['turno_entrega_id']; ?></td>
			<td><?php echo $pedido['con_envio']; ?></td>
			<td><?php echo $pedido['del']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pedidos', 'action' => 'view', $pedido['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pedidos', 'action' => 'edit', $pedido['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pedidos', 'action' => 'delete', $pedido['id']), array(), __('Are you sure you want to delete # %s?', $pedido['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
