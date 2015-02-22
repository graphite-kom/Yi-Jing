<div class="mockdatas form">
<?php echo $this->Form->create('Mockdata');?>
	<fieldset>
 		<legend><?php __('Add Mockdata'); ?></legend>
	<?php
	
		/////////////////////					/////////////////////
		//	TYPES								//	OPTIONS
		//	select options						//	maxlength
		//	radio								//	default	
		//	check box							//	selected
		//	password							//	empty
		//	textarea							//	...............
	
		echo $this->Form->input('mockdatafield1', array('label' => 'Not empty', 'type' => 'file'));
		echo $this->Form->input('mockdatafield2', array('label' => 'Alpha-Numeric', 'type' => 'select', /*'multiple' => true, */'empty' => 'Choose one', 'options' => array('dollar' => '$', 'percent' => '%', 'basinBoy' => 'B', 'two' => '2', 'star' => '*', 'why?' => 'Y')));
		echo $this->Form->input('mockdatafield3', array('label' => 'E-mail address', 'type' => 'text', 'default' => ''));
		// echo $this->Form->input('mockdatafield4', array('label' => 'Numerical', 'type' => 'radio', 'options' => array('a' => 'A', '1' => '1', 'b' => 'B', '2' => '2')));
		echo $this->Form->input('mockdatafield4', array('legend' => 'Numerical', 'type' => 'radio', /*'value' => 'yes', */'options' => array('yes' => 'YES', '10' => '10', 'no' => 'NO', '50' => '50', )));
		echo $this->Form->input('mockdatafield5', array('label' => 'Check Boxes - Not empty', 'type' => 'checkbox'));
		echo $this->Form->input('mockdatafield6', array('label' => 'Password - Not empty', 'type' => 'password', 'value' => ''));
		echo $this->Form->input('mockdatafield7', array('label' => 'Text Area - Not empty', 'type' => 'string'));
		echo $this->Form->input('Descendantdata.0.descendantdata1', array('label' => 'Descendantdata 1', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata2', array('label' => 'Descendantdata 2', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata3', array('label' => 'Descendantdata 3', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata4', array('label' => 'Descendantdata 4', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata5', array('label' => 'Descendantdata 5', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata6', array('label' => 'Descendantdata 6', 'type' => 'text'));
		echo $this->Form->input('Descendantdata.0.descendantdata7', array('label' => 'Descendantdata 7', 'type' => 'text'));
		
		// Original // echo $this->Form->button('Submit', array('type' => 'button', 'onmouseup' => 'javascript:validateForm(this);', 'id' => 'formSubmit'));
		// echo $this->Js->submit('Submit', array('id' => 'formSubmit', 'url' => 'response', 'update' => '#feedbackDiv'));
		echo $this->Form->submit('Submit', array('id' => 'formSubmit'));
		// echo $this->Html->image('icons/loadinfo.gif', array('alt' => 'Loading', 'style' => $this->Html->style(array('float' => 'left', 'margin-left' => '15px;'), true)));

	?>
	</fieldset>
<?php // echo $this->Form->end(__('Submit', true));?>
<?php echo $this->Form->end();?>
<?php


	///////////////////////////////////////////////////////////////////////////////////
	// START config
	///////////////////////////////////////////////////////////////////////////////////
		
		// Forms :
		// for each form specify submit button ID and 
		// whether or not to check fields indidually or onSubmit
		// write as an array // example :
		//	$forms = array(
		//		array(
		//			'submitButtonID' => '#formSubmit', 
		//			'validateMethod' => 'all'	
		//		),
		//		array(
		//			'submitButtonID' => '#formSubmit2', 
		//			'validateMethod' => 'each'
		//		)
		//	);
		
		$formsFromPage = array(
			array(
				'submitButtonID' => '#formSubmit',
			
				'validateMethod' => 'each',
				// 
				// possible values 'all' or 'each'
				//
				// if 'all', all fields will be validated together
				// when the user click submit button
				//
				// if 'each', each field will be validated indidually
				// when the user enters each field
				// 
				
				'displayMethod' => array('each', 'bubble')
				// 
				// has to be written in the form of an array
				//
				//	- - - - - - - - - - - - - - - - - - - - - - - - - - - - 
				//
				// possible values :
				// 		array('all', 'before') or array('all', 'after')
				// 		array('each', 'div') or array('each', 'bubble')
				//
				//	- - - - - - - - - - - - - - - - - - - - - - - - - - - - 
				//
				// if 'all', the validation results will 
				// show together in a div element with a class "-----" attribute
				//
				// if 'all' is set to 'before' the div will be 
				// inserted just before the form element
				//
				// if 'all' is set to 'after' the div will be 
				// inserted just after the form element
				//
				//	- - - - - - - - - - - - - - - - - - - - - - - - - - - - 
				//
				// if 'each', the validation results will 
				// show separately after each form field element
				// in a div element with a class "-----" attribute
				//
				// if 'each' is set to 'bubble' the div will be 
				// in the form of a bubble
				//
				// if 'each' is set to 'div' the div will be 
				// styled with float left css properties
				//				
			)/*,		Possible second form to validate
			array(
				'submitButtonID' => '#formSubmit2', 
				'validateMethod' => 'each'
			)*/
		);
		
		$this->FormValidation->setUpFormValidation($formsFromPage)

	///////////////////////////////////////////////////////////////////////////////////
	// END config
	///////////////////////////////////////////////////////////////////////////////////
		
?>
<div style="background-color:#999999;margin-top:30px;float: left;clear: both;" id="feedbackDiv">&nbsp;&nbsp;&nbsp;</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mockdatas', true), array('action' => 'index'));?></li>
	</ul>
</div>
<!-- START To be mapped -->
<?php 
		
		///
		/*
		if(Set::check($this->Session->read('letsSeeAllThisData'))){
			$letsSeeAllThisData = $this->Session->read('letsSeeAllThisData');
		}else{
			$letsSeeAllThisData = '';
		}*/
		
		if (Set::check($this->Session->read('Hulahoop'))) {
			$hulahoop = $this->Session->read('Hulahoop');
		}
		
		$toBeMapped = array(
			'pageParam' => $pageParam,
			'formsFromPage' => $formsFromPage,
			'getVars' => $this->getVars(),
			// 'letsSeeAllThisData' => $letsSeeAllThisData 
		);
		
		echo $this->Makenice->exportMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
		/*
		echo '<div style="clear:both; background-color:#ff0000; padding:20px">';
		$exported = $makenice->showDebug($toBeMapped);
		echo $exported;
		echo '</div>';
		*/
?>
<!-- END To be mapped -->