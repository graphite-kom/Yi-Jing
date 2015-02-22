<div class="branches form">
<?php echo $this->Form->create('Branch');?>
	<fieldset>
 		<legend><?php __('Add Branch'); ?></legend>
	<?php
		echo $this->Form->input('branche');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Branches', true), array('action' => 'index'));?></li>
	</ul>
</div>