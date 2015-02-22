<div class="mockdatas view">
<h2><?php  __('Mockdata');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield4'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield4']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield5'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield5']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield6'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield6']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mockdatafield7'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mockdata['Mockdata']['mockdatafield7']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mockdata', true), array('action' => 'edit', $mockdata['Mockdata']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mockdata', true), array('action' => 'delete', $mockdata['Mockdata']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mockdata['Mockdata']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mockdatas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mockdata', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
