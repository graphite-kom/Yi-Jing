<div class="relationships index">
	<h2><?php __('Relationships');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php __('Id'); ?></th>
			<th><?php __('Hexagram'); ?></th>
			<th><?php __('FirstTrait'); ?></th>
			<th><?php __('SecondTrait'); ?></th>
			<th><?php __('RelationshipType'); ?></th>
			<th><?php __('SpecialBranchStatus'); ?></th>
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
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Relationship', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div>
<?php 
		$toBeMapped = array(
			'relationships' => $relationships,
			'preparedData' => $preparedData
		);

		echo $makenice->doDataMap($toBeMapped); 
		
?>
</div>