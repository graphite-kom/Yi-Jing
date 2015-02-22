<div class="troncs form">
<?php echo $this->Form->create('Tronc');?>
	<fieldset>
 		<legend><?php __('Add Tronc'); ?></legend>
	<?php
		echo $this->Form->input('tronc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Troncs', true), array('action' => 'index'));?></li>
	</ul>
</div>