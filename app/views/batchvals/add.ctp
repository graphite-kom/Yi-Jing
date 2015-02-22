<div class="batchvals form">
<?php echo $this->Form->create('Batchval');?>
	<fieldset>
 		<legend><?php __('Add Batchval'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Batchvals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Batchops', true), array('controller' => 'batchops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
	</ul>
</div>