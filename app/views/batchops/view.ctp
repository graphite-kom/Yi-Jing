<div class="batchops view">
<h2><?php  __('Batchop');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchop['Batchop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('BatchOperationName'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchop['Batchop']['batchOperationName']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Batchop', true), array('action' => 'edit', $batchop['Batchop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Batchop', true), array('action' => 'delete', $batchop['Batchop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $batchop['Batchop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Batchops', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batchvals', true), array('controller' => 'batchvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchval', true), array('controller' => 'batchvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Batchvals');?></h3>
	<?php if (!empty($batchop['Batchval'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Batchop Id'); ?></th>
		<th><?php __('Field1'); ?></th>
		<th><?php __('Field2'); ?></th>
		<th><?php __('Field3'); ?></th>
		<th><?php __('Field4'); ?></th>
		<th><?php __('Field5'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($batchop['Batchval'] as $batchval):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $batchval['id'];?></td>
			<td><?php echo $batchval['batchop_id'];?></td>
			<td><?php echo $batchval['field1'];?></td>
			<td><?php echo $batchval['field2'];?></td>
			<td><?php echo $batchval['field3'];?></td>
			<td><?php echo $batchval['field4'];?></td>
			<td><?php echo $batchval['field5'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'batchvals', 'action' => 'view', $batchval['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'batchvals', 'action' => 'edit', $batchval['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'batchvals', 'action' => 'delete', $batchval['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $batchval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Batchval', true), array('controller' => 'batchvals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
