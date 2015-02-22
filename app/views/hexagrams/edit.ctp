<div class="hexagrams form">
<?php echo $this->Form->create('Hexagram');?>
	<fieldset>
 		<legend><?php __('Edit Hexagram'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('element');
		echo $this->Form->input('anneeTronc');
		echo $this->Form->input('anneeBranche');
		echo $this->Form->input('moisTronc');
		echo $this->Form->input('moisBranche');
		echo $this->Form->input('jourTronc');
		echo $this->Form->input('jourBranche');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Hexagram.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Hexagram.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('controller' => 'traits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trait', true), array('controller' => 'traits', 'action' => 'add')); ?> </li>
	</ul>
</div>