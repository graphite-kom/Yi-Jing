<div class="troncs view">
<h2><?php  __('Tronc');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tronc['Tronc']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tronc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tronc['Tronc']['tronc']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tronc', true), array('action' => 'edit', $tronc['Tronc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tronc', true), array('action' => 'delete', $tronc['Tronc']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tronc['Tronc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Troncs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tronc', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
