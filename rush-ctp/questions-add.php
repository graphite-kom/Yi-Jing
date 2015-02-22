<div class="questions form">
<?php echo $form->create('Question', array('action' => 'add'));?>
	<fieldset>
 		<legend><?php __('Add Question'); ?></legend>
	<?php
		echo $form->input('Question.questionField');
		echo $form->input('Question.efficaceUtilitaire');
		echo $form->input('Question.jour');
		echo $form->input('Question.Mois');
		echo $form->input('Question.annee');
		echo $form->input('Commentary.0.commentText');
		echo $form->input('Commentary.1.commentText');
		echo $form->input('Commentary.2.commentText');
		


		/*echo $this->Form->input('questionField');
		echo $this->Form->input('efficaceUtilitaire');
		echo $this->Form->input('jour');
		echo $this->Form->input('Mois');
		echo $this->Form->input('annee');*/
	?>
	</fieldset>
<?php echo $form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Commentaries', true), array('controller' => 'commentaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commentary', true), array('controller' => 'commentaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); ?> </li>
	</ul>
</div>