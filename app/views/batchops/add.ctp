<div class="batchops form">
<?php echo $this->Form->create('Batchop');?>
	<fieldset>
 		<legend><?php __('Add Batchop'); ?></legend>
	<?php
		echo $this->Form->input('batchOperationName');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Batchops', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Batchvals', true), array('controller' => 'batchvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchval', true), array('controller' => 'batchvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>