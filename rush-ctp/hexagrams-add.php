<div class="hexagrams form">
<h2><?php echo '<strong>Question :</strong> '.$hexagramData['Question']['questionField']; ?></h2>
<div style="margin:0 0 10px 0;"><?php echo '<strong>Efficace utilitaire :</strong> '.$hexagramData['Question']['efficaceUtilitaire']; ?></div>
<?php echo $this->Form->create('Hexagram');?>
	<fieldset>
 		<legend><?php __('Add Hexagram'); ?></legend>
	<?php
		echo $this->Form->hidden('question_id', array('default' => $hexagramData['Question']['id']));
		echo $this->Form->input('element');
		echo $this->Form->input('Trait.6.traitValue', array('label' => 'Trait n°6'));
		echo $this->Form->input('Trait.5.traitValue', array('label' => 'Trait n°5'));
		echo $this->Form->input('Trait.4.traitValue', array('label' => 'Trait n°4'));
		echo $this->Form->input('Trait.3.traitValue', array('label' => 'Trait n°3'));
		echo $this->Form->input('Trait.2.traitValue', array('label' => 'Trait n°2'));
		echo $this->Form->input('Trait.1.traitValue', array('label' => 'Trait n°1'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<?php
	/*
	echo $form->create();
	echo $form->input('Hexagram.element', array('label' => 'Hexagram Element'));
	echo $form->input('Trait.6.traitValue', array('label' => 'Trait Value'));
	echo $form->input('Trait.5.traitValue', array('label' => 'Trait Value'));
	echo $form->input('Trait.4.traitValue', array('label' => 'Trait Value'));
	echo $form->input('Trait.3.traitValue', array('label' => 'Trait Value'));
	echo $form->input('Trait.2.traitValue', array('label' => 'Trait Value'));
	echo $form->input('Trait.1.traitValue', array('label' => 'Trait Value'));
	echo $form->end('Add');
	*/
?>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('controller' => 'traits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trait', true), array('controller' => 'traits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<!-- START Data Map -->
<div id="dataMap">
	<div id="hidden" style="background-color:#006666;clear:both; padding:5px 15px; color:ffffff;" onclick="javascript:showMakenice();">Show Data Map +</div>
	
	<div id="shown" style="background-color:#006666;clear:both;display:none; padding:5px 15px; color:fff;" onclick="javascript:hideMakenice();">
		<div>Hide Data Map -</div>
		<div><?php echo '<strong>Hexagram Data :</strong><br/>'.$makenice->makenice($hexagramData); ?></div>
		<hr/>
		<div><?php echo '<strong>All my Parameters :</strong><br/>'.$makenice->makenice($allMyParameters); ?></div>
		<hr/>
		<div>
			<?php 
				if($makenice->isValid($postedData) == 1){
					echo '<strong>Posted Data :</strong><br/>'.$makenice->makenice($postedData);
				}
			?>
		</div>
		
	</div>
</div>
<!-- END Data Map -->