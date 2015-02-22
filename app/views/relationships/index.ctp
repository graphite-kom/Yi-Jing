<div class="relationships index">
	<h2><?php __('Relationships');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hexagram_id');?></th>
			<th><?php echo $this->Paginator->sort('firstTrait');?></th>
			<th><?php echo $this->Paginator->sort('secondTrait');?></th>
			<th><?php echo $this->Paginator->sort('relationshipType');?></th>
			<th><?php echo $this->Paginator->sort('specialBranchStatus');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($relationships as $relationship):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $relationship['Relationship']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($relationship['Hexagram']['id'], array('controller' => 'hexagrams', 'action' => 'view', $relationship['Hexagram']['id'])); ?>
		</td>
		<td><?php echo $relationship['Relationship']['firstTrait']; ?>&nbsp;</td>
		<td><?php echo $relationship['Relationship']['secondTrait']; ?>&nbsp;</td>
		<td><?php echo $relationship['Relationship']['relationshipType']; ?>&nbsp;</td>
		<td><?php echo $relationship['Relationship']['specialBranchStatus']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $relationship['Relationship']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $relationship['Relationship']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $relationship['Relationship']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $relationship['Relationship']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Relationship', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>