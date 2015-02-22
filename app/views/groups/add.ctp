<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php __('Add Group'); ?></legend>
	<?php
		///
		$options =  array();
		$options[0] = 'No parent group';
		foreach($groups as $groupNB => $value){
			$options[$groupNB] = $value;
		}
		///
		echo $this->Form->input(
			'parent_id', 
			array(
				'label' => 'Parent Group', 
				'options' => $options
			)
		);
		///
		// echo $this->Form->input('parent_id');
		echo $this->Form->input('groupName');
		echo $this->Form->input('questionTemplate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
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
			'Groups' => $groups,
			'options' => $options
		);
		
		echo $makenice->doDataMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
?>
<!-- END To be mapped -->