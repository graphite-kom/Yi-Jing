<div class="loops view">
<h2><?php  __('Loop');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loop['Loop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loop['Loop']['parent_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Element'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loop['Loop']['element']; ?>
			&nbsp;&nbsp;&nbsp;Parent Loop : <?php echo $loop['ParentLoop']['element']; ?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Loop', true), array('action' => 'edit', $loop['Loop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Loop', true), array('action' => 'delete', $loop['Loop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $loop['Loop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loop', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('controller' => 'loops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loop', true), array('controller' => 'loops', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Loops');?></h3>
	<?php if (!empty($loop['Loop'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $loop['Loop']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $loop['Loop']['parent_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Element');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $loop['Loop']['element'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Loop', true), array('controller' => 'loops', 'action' => 'edit', $loop['Loop']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div style="clear:both;"><?php echo $makenice->makenice($loop); ?></div>
	