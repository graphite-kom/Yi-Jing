<div class="menucats form">
<?php echo $this->Form->create('Menucat');?>
	<fieldset>
 		<legend><?php __('Edit Menucat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('menucatField');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Menucat.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Menucat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Menucats', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Menulinks', true), array('controller' => 'menulinks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menulink', true), array('controller' => 'menulinks', 'action' => 'add')); ?> </li>
	</ul>
</div>