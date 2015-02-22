<div class="batchvals view">
<h2><?php  __('Batchval');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Batchop'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($batchval['Batchop']['batchOperationName'], array('controller' => 'batchops', 'action' => 'view', $batchval['Batchop']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['field1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['field2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['field3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field4'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['field4']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field5'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $batchval['Batchval']['field5']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Batchval', true), array('action' => 'edit', $batchval['Batchval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Batchval', true), array('action' => 'delete', $batchval['Batchval']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $batchval['Batchval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Batchvals', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchval', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batchops', true), array('controller' => 'batchops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
	</ul>
</div>
