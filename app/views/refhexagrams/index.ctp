<div class="refhexagrams index">
	<h2><?php __('Refhexagrams');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('supTrigram');?></th>
			<th><?php echo $this->Paginator->sort('infTrigram');?></th>
			<th><?php echo $this->Paginator->sort('element');?></th>
			<th><?php echo $this->Paginator->sort('self');?></th>
			<th><?php echo $this->Paginator->sort('other');?></th>
			<th><?php echo $this->Paginator->sort('level1branch');?></th>
			<th><?php echo $this->Paginator->sort('level4branch');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($refhexagrams as $refhexagram):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $refhexagram['Refhexagram']['id']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['supTrigram']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['infTrigram']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['element']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['self']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['other']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['level1branch']; ?>&nbsp;</td>
		<td><?php echo $refhexagram['Refhexagram']['level4branch']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $refhexagram['Refhexagram']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $refhexagram['Refhexagram']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $refhexagram['Refhexagram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $refhexagram['Refhexagram']['id'])); ?>
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
<!--
<div class="actions">
	<h3><?php /* __('Actions'); */ ?></h3>
	<ul>
		<li><?php /* echo $this->Html->link(__('New Refhexagram', true), array('action' => 'add')); */ ?></li>
		<li><?php /* echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); */ ?> </li>
		<li><?php /* echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); */ ?> </li>
	</ul>
</div>
-->