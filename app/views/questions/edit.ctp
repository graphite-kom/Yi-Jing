<?php
	// $this->Js->domReady('changeOptions()', true);
	$this->Js->buffer('changeOptions();');
	
?>
<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
		echo $this->Form->input('questionField');
		
		$effDefaultValue = $this->data['Question']['efficaceUtilitaire'];
		echo $this->Form->input('efficaceUtilitaire', array( 'onChange' => 'javascript:changeOptions();' ,'options' => array('wealth' => 'Wealth', 'child' => 'Child', 'brother' => 'Bother', 'parent' => 'Parent', 'official' => 'Official', ), 'default' => $effDefaultValue));
		
		echo $this->Form->hidden('descDefaultValue', array('default' => $this->data['Question']['efficaceDescription'], 'id' => 'descDefaultValue'));
		
		echo $this->Form->input('efficaceDescription', array('disabled' => 'disabled','div' => array('id' => 'efficaceDescriptionDiv'), 'options' => array('0' => 'XXXXXX' ), 'empty' => ''));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Question.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index'));?></li>
		<!-- 
		<li><?php /* echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index'));*/ ?> </li>
		<li><?php /* echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add'));*/ ?> </li>
		 -->
	</ul>
</div>
<?php 
	
		///		
	
		$effValue = $this->data['Question']['efficaceUtilitaire'];

		$toBeMapped = array(
			'data' => $this->data,
			'Efficace Utilitaire Value' => $effValue			
		);

		echo $makenice->doDataMap($toBeMapped); 
		

?>
