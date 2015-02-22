<div class="relationships form">
<?php echo $this->Form->create('Relationship');?>
	<fieldset>
 		<legend><?php __('Edit Relationship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('hexagram_id');
		echo $this->Form->input('firstTrait');
		echo $this->Form->input('secondTrait');
		echo $this->Form->input('relationshipType');
		echo $this->Form->input('specialBranchStatus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Relationship.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Relationship.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Relationships', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>