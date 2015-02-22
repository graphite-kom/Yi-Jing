<div class="relationships view">
<h2><?php  __('Relationship');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $relationship['Relationship']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hexagram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($relationship['Hexagram']['id'], array('controller' => 'hexagrams', 'action' => 'view', $relationship['Hexagram']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FirstTrait'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $relationship['Relationship']['firstTrait']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SecondTrait'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $relationship['Relationship']['secondTrait']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RelationshipType'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $relationship['Relationship']['relationshipType']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SpecialBranchStatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $relationship['Relationship']['specialBranchStatus']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Relationship', true), array('action' => 'edit', $relationship['Relationship']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Relationship', true), array('action' => 'delete', $relationship['Relationship']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $relationship['Relationship']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Relationships', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Relationship', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
