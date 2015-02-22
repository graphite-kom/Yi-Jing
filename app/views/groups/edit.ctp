<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php __('Edit Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('groupName');
		echo $this->Form->input('questionTemplate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Group.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>