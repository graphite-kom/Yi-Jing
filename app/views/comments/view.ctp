<div class="comments view">
<h2><?php  __('Comment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comment['Comment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hexagram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($comment['Hexagram']['id'], array('controller' => 'hexagrams', 'action' => 'view', $comment['Hexagram']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comment['Comment']['comment']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comment['Comment']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comment', true), array('action' => 'edit', $comment['Comment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Comment', true), array('action' => 'delete', $comment['Comment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['Comment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
