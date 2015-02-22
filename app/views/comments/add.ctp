<div class="comments form">
<?php echo $this->Form->create('Comment');?>
	<fieldset>
 		<legend><?php __('Add Comment'); ?></legend>
	<?php
		echo $this->Form->input('hexagram_id');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<!-- START To be mapped -->
<?php 
	
		///
		
		$toBeMapped = array(
			'Hexagrams' => $hexagrams
		);
		
		echo $makenice->doDataMap($toBeMapped); 
		
?>
<!-- END To be mapped -->