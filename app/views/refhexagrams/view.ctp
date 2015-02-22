<div class="refhexagrams view">
<h2><?php  __('Refhexagram');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SupTrigram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['supTrigram']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('InfTrigram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['infTrigram']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Element'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['element']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Self'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['self']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Other'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['other']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Level1branch'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['level1branch']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Level4branch'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refhexagram['Refhexagram']['level4branch']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Refhexagram', true), array('action' => 'edit', $refhexagram['Refhexagram']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Refhexagram', true), array('action' => 'delete', $refhexagram['Refhexagram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $refhexagram['Refhexagram']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Refhexagrams', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Refhexagram', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Hexagrams');?></h3>
	<?php if (!empty($refhexagram['Hexagram'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Question Id'); ?></th>
		<th><?php __('Refhexagram Id'); ?></th>
		<th><?php __('Element'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('AnneeTronc'); ?></th>
		<th><?php __('AnneeBranche'); ?></th>
		<th><?php __('MoisTronc'); ?></th>
		<th><?php __('MoisBranche'); ?></th>
		<th><?php __('JourTronc'); ?></th>
		<th><?php __('JourBranche'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($refhexagram['Hexagram'] as $hexagram):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $hexagram['id'];?></td>
			<td><?php echo $hexagram['question_id'];?></td>
			<td><?php echo $hexagram['refhexagram_id'];?></td>
			<td><?php echo $hexagram['element'];?></td>
			<td><?php echo $hexagram['created'];?></td>
			<td><?php echo $hexagram['anneeTronc'];?></td>
			<td><?php echo $hexagram['anneeBranche'];?></td>
			<td><?php echo $hexagram['moisTronc'];?></td>
			<td><?php echo $hexagram['moisBranche'];?></td>
			<td><?php echo $hexagram['jourTronc'];?></td>
			<td><?php echo $hexagram['jourBranche'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'hexagrams', 'action' => 'view', $hexagram['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'hexagrams', 'action' => 'edit', $hexagram['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'hexagrams', 'action' => 'delete', $hexagram['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hexagram['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
