<div class="menucats index">
	<h2><?php __('Menucats');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('menucatField');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($menucats as $menucat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $menucat['Menucat']['id']; ?>&nbsp;</td>
		<td><?php echo $menucat['Menucat']['menucatField']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $menucat['Menucat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $menucat['Menucat']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $menucat['Menucat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menucat['Menucat']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Menucat', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Menulinks', true), array('controller' => 'menulinks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menulink', true), array('controller' => 'menulinks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div>
	<?php 
	if(Set::check($makenice)){
		$toBeMapped = array('menucats' => $menucats);
		echo $makenice->doDataMap($toBeMapped);
	}
	?>
</div>