<div class="batchvals index">
	<h2><?php __('Batchvals');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('batchop_id');?></th>
			<th><?php echo $this->Paginator->sort('field1');?></th>
			<th><?php echo $this->Paginator->sort('field2');?></th>
			<th><?php echo $this->Paginator->sort('field3');?></th>
			<th><?php echo $this->Paginator->sort('field4');?></th>
			<th><?php echo $this->Paginator->sort('field5');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($batchvals as $batchval):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $batchval['Batchval']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($batchval['Batchop']['batchOperationName'], array('controller' => 'batchops', 'action' => 'view', $batchval['Batchop']['id'])); ?>
		</td>
		<td><?php echo $batchval['Batchval']['field1']; ?>&nbsp;</td>
		<td><?php echo $batchval['Batchval']['field2']; ?>&nbsp;</td>
		<td><?php echo $batchval['Batchval']['field3']; ?>&nbsp;</td>
		<td><?php echo $batchval['Batchval']['field4']; ?>&nbsp;</td>
		<td><?php echo $batchval['Batchval']['field5']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $batchval['Batchval']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $batchval['Batchval']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $batchval['Batchval']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $batchval['Batchval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Batchval', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Batchops', true), array('controller' => 'batchops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
	</ul>
</div>