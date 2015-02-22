<div class="refhexagrams form">
<?php echo $this->Form->create('Refhexagram');?>
	<fieldset>
 		<legend><?php __('Add Refhexagram'); ?></legend>
	<?php
		echo $this->Form->input('supTrigram');
		echo $this->Form->input('infTrigram');
		echo $this->Form->input('element');
		echo $this->Form->input('self');
		echo $this->Form->input('other');
		echo $this->Form->input('level1branch');
		echo $this->Form->input('level4branch');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Refhexagrams', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>