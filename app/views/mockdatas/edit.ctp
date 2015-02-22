<div class="mockdatas form">
<?php echo $this->Form->create('Mockdata');?>
	<fieldset>
 		<legend><?php __('Edit Mockdata'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('mockdatafield1');
		echo $this->Form->input('mockdatafield2');
		echo $this->Form->input('mockdatafield3');
		echo $this->Form->input('mockdatafield4');
		echo $this->Form->input('mockdatafield5');
		echo $this->Form->input('mockdatafield6');
		echo $this->Form->input('mockdatafield7');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Mockdata.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Mockdata.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mockdatas', true), array('action' => 'index'));?></li>
	</ul>
</div>