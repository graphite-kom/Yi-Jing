<div class="loops index">
	<h2><?php __('Loops');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('element');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th>Parent Element</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($loops as $loop):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $loop['Loop']['id']; ?>&nbsp;</td>
		<td><?php echo $loop['Loop']['element']; ?>
		<td><?php echo $loop['Loop']['parent_id']; ?>&nbsp;</td>
		<td><?php if($loop['Loop']['parent_id'] != '0'){
					echo 'Parent Loop : '.$loop['ParentLoop']['element'].'';
				}	
			?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $loop['Loop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $loop['Loop']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $loop['Loop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $loop['Loop']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Loop', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('controller' => 'loops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loop', true), array('controller' => 'loops', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div style="clear:both;"><?php echo $makenice->makenice($loops); ?></div>