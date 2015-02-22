<div class="batchvals form">
<?php echo $this->Form->create('Batchval');?>
	<fieldset>
 		<legend><?php __('Edit Batchval'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('batchop_id');
		echo $this->Form->input('field1');
		echo $this->Form->input('field2');
		echo $this->Form->input('field3');
		echo $this->Form->input('field4');
		echo $this->Form->input('field5');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Batchval.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Batchval.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Batchvals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Batchops', true), array('controller' => 'batchops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
	</ul>
</div>