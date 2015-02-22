<div class="traits form">
<?php echo $this->Form->create('Trait');?>
	<fieldset>
 		<legend><?php __('Edit Trait'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('traitValue');
		echo $this->Form->input('hexagram_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Trait.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Trait.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>