<div class="loops form">
<?php echo $this->Form->create('Loop');?>
	<fieldset>
 		<legend><?php __('Edit Loop'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('element');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Loop.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Loop.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('controller' => 'loops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loop', true), array('controller' => 'loops', 'action' => 'add')); ?> </li>
	</ul>
</div>