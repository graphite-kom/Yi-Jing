<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Add Question'); ?></legend>
	<?php
		///
		$options =  array();
		$options[0] = 'No parent group';
		foreach($groups as $groupNB => $value){
			$options[$groupNB] = $value;
		}
		///
		echo $this->Form->input(
			'group_id', 
			array(
				'label' => 'Group', 
				'options' => $options
			)
		);
		///
		echo $this->Form->input('questionField');
		echo $this->Form->input('efficaceUtilitaire', array( 'onChange' => 'javascript:changeOptions();' ,'options' => array('wealth' => 'Wealth', 'child' => 'Child', 'brother' => 'Bother', 'parent' => 'Parent', 'official' => 'Official'), 'empty' => ''));
		echo $this->Form->input('efficaceDescription', array('disabled' => 'disabled','div' => array('id' => 'efficaceDescriptionDiv'), 'options' => array('0' => 'XXXXXX' ), 'empty' => ''));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index'));?></li>
		<!--  
		<li><?php /* echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); */ ?> </li>
		<li><?php /* echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); */ ?> </li>
		 -->
	</ul>
</div>
<!-- START To be mapped -->
<?php 
	
		///
		/*
		if(Set::check($this->Session->read('pageData'))){
			$pageData = $this->Session->read('pageData');
		}else{
			$pageData = '';
		}*/
		
		
		$toBeMapped = array(
			'Groups' => $groups
		);
		
		echo $makenice->doDataMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
?>
<!-- END To be mapped -->