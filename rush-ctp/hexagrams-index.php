<div class="hexagrams index">
	<h2><?php __('Hexagrams');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('element');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($hexagrams as $hexagram):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $hexagram['Hexagram']['id']; ?>&nbsp;</td>
		<td><?php echo $hexagram['Hexagram']['element']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $hexagram['Hexagram']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $hexagram['Hexagram']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $hexagram['Hexagram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hexagram['Hexagram']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('controller' => 'traits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trait', true), array('controller' => 'traits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<!-- START Data Map -->
<div id="dataMap">
	<div id="hidden" style="background-color:#006666;clear:both; padding:5px 15px; color:ffffff;" onclick="javascript:showMakenice();">Show Data Map +</div>
	
	<div id="shown" style="background-color:#006666;clear:both;display:none; padding:5px 15px; color:fff;" onclick="javascript:hideMakenice();">
		<div>Hide Data Map -</div>
		<div><?php echo $makenice->makenice($hexagrams);?></div>
	</div>
</div>
<!-- END Data Map -->