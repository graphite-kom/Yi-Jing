<div class="troncs form">
<?php echo $this->Form->create('Tronc');?>
	<fieldset>
 		<legend><?php __('Edit Tronc'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tronc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tronc.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tronc.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Troncs', true), array('action' => 'index'));?></li>
	</ul>
</div>