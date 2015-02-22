<div class="mockdatas index">
	<h2><?php __('Mockdatas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield1');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield2');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield3');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield4');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield5');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield6');?></th>
			<th><?php echo $this->Paginator->sort('mockdatafield7');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mockdatas as $mockdata):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mockdata['Mockdata']['id']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield1']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield2']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield3']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield4']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield5']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield6']; ?>&nbsp;</td>
		<td><?php echo $mockdata['Mockdata']['mockdatafield7']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mockdata['Mockdata']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mockdata['Mockdata']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mockdata['Mockdata']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mockdata['Mockdata']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mockdata', true), array('action' => 'add')); ?></li>
	</ul>
</div>