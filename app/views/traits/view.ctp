<div class="traits view">
<h2><?php  __('Trait');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $trait['Trait']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TraitValue'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $trait['Trait']['traitValue']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hexagram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($trait['Hexagram']['id'], array('controller' => 'hexagrams', 'action' => 'view', $trait['Hexagram']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trait', true), array('action' => 'edit', $trait['Trait']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Trait', true), array('action' => 'delete', $trait['Trait']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $trait['Trait']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trait', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
