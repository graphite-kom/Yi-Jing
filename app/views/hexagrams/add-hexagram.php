<div class="hexagrams form">
<?php echo $this->Form->create('Hexagram');?>
	<fieldset>
 		<legend><?php __('Add Hexagram'); ?></legend>
	<?php
		echo '<div style="font-size:24px;font-weight:bold;margin:0 0 15px 0;">'.$questions['Question']['questionField'].'</div>';
		echo $this->Form->hidden('question', array('default' => $questions['Question']['questionField']));
		echo $this->Form->hidden('question_id', array('default' => $questions['Question']['id']));
		echo $this->Form->hidden('efficaceUtilitaire', array('default' => $questions['Question']['efficaceUtilitaire']));
		echo $this->Form->hidden('parent_id', array('default' => 0));
		
		/////////////////////////////////////////////////////////////////////////
		/// START dateFormTable
		/// dateFormTable is the variable ion which we store the form select inputs 
		/// for all the tronc/branche value pairs for Year Month and Day 
		$dateFormTable = '';
		$dateFormTable .= '<table border="0" cellspacing="0" cellpadding="0">';
			$dateFormTable .= '<tr>';
				$dateFormTable .= '<td>YEAR</td>';
				$dateFormTable .= '<td>&nbsp;</td>';
				$dateFormTable .= '<td>MONTH</td>';
				$dateFormTable .= '<td>&nbsp;</td>';
				$dateFormTable .= '<td>DAY</td>';
				$dateFormTable .= '<td>&nbsp;</td>';
			$dateFormTable .= '</tr>';
			$dateFormTable .= '<tr>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.anneeTronc', $dateselect->troncMakeOptions($troncs)).'</td>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.anneeBranche', $dateselect->brancheMakeOptions($branches)).'</td>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.moisTronc', $dateselect->troncMakeOptions($troncs)).'</td>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.moisBranche', $dateselect->brancheMakeOptions($branches)).'</td>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.jourTronc', $dateselect->troncMakeOptions($troncs)).'</td>';
				$dateFormTable .= '<td>'.$this->Form->select('Hexagram.jourBranche', $dateselect->brancheMakeOptions($branches)).'</td>';
			$dateFormTable .= '</tr>';
		$dateFormTable .= '</table>';
		echo $dateFormTable.'<hr/>';
		/// END dateFormTable
		
		/// 
		// echo $this->Form->input('element');
		///
		echo $this->Form->input(
			'Trait.6.traitValue', 
			array(
				'label' => 'Trait at level 6', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.6.traitPosition', array('default' => 6));
		
		///
		echo $this->Form->input(
			'Trait.5.traitValue', 
			array(
				'label' => 'Trait at level 5', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.5.traitPosition', array('default' => 5));
		
		///
		echo $this->Form->input(
			'Trait.4.traitValue', 
			array(
				'label' => 'Trait at level 4', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.4.traitPosition', array('default' => 4));
		
		///
		echo $this->Form->input(
			'Trait.3.traitValue', 
			array(
				'label' => 'Trait at level 3', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.3.traitPosition', array('default' => 3));
		
		///
		echo $this->Form->input(
			'Trait.2.traitValue', 
			array(
				'label' => 'Trait at level 2', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.2.traitPosition', array('default' => 2));
		
		///
		echo $this->Form->input(
			'Trait.1.traitValue', 
			array(
				'label' => 'Trait at level 1', 
				'options' => array(
					'6' => '---x---',
					'7' => '-------',
					'8' => '--- ---',
					'9' => '---o---'),
				'empty' => 'Choose value'
			)
		);
		
		echo $this->Form->hidden('Trait.1.traitPosition', array('default' => 1));
		

/*
		echo $this->Form->input('Trait.6.traitValue', array('label' => 'Trait at level 6'));
		echo $this->Form->input('Trait.5.traitValue', array('label' => 'Trait at level 5'));
		echo $this->Form->input('Trait.4.traitValue', array('label' => 'Trait at level 4'));
		echo $this->Form->input('Trait.3.traitValue', array('label' => 'Trait at level 3'));
		echo $this->Form->input('Trait.2.traitValue', array('label' => 'Trait at level 2'));
		echo $this->Form->input('Trait.1.traitValue', array('label' => 'Trait at level 1'));
*/
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Traits', true), array('controller' => 'traits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trait', true), array('controller' => 'traits', 'action' => 'add')); ?> </li>
	</ul>
</div>

<!-- START Helper -->
<?php 
	
		///
		
		if(Set::check($this->Session->read('letsSeeAllThisData'))){
			$letsSeeAllThisData = $this->Session->read('letsSeeAllThisData');
		}else{
			$letsSeeAllThisData = '';
		}
		
		if(Set::check($this->Session->read('completedArray'))){
			$completedArray = $this->Session->read('completedArray');
		}else{
			$completedArray = '';
		}
		
		if(Set::check($this->Session->read('mutatedArray'))){
			$mutatedArray = $this->Session->read('mutatedArray');
		}else{
			$mutatedArray = 'Not found';
		}
		
		if(Set::check($this->Session->read('relationshipsArray'))){
			$relationshipsArray = $this->Session->read('relationshipsArray');
		}else{
			$relationshipsArray = 'Not found';
		}		
		
		if(Set::check($this->Session->read('mainHexagram'))){
			$mainHexagram = $this->Session->read('mainHexagram');
		}else{
			$mainHexagram = 'Not found';
		}		
		
		if(Set::check($this->Session->read('analysis'))){
			$analysis = $this->Session->read('analysis');
		}else{
			$analysis = 'Not found';
		}				
	
		$toBeMapped = array(
			'questions' => $questions,
			'analysis' => $analysis
			/*'mainHexagram' => $mainHexagram, 
			'letsSeeAllThisData' => $letsSeeAllThisData, 
			'mutatedArray' => $mutatedArray,
			'completedArray' => $completedArray,
			'relationshipsArray' => $relationshipsArray
			*/
		);

		echo $makenice->doDataMap($toBeMapped); 

		$this->Session->delete('letsSeeAllThisData');
		$this->Session->delete('completedArray');
		$this->Session->delete('mutatedArray');
		$this->Session->delete('relationshipsArray');
		$this->Session->delete('analysis');
		
		

?>
<!-- END Helper -->