<?php

class CompletearrayComponent extends Object{
	
		
	var $components = array('setbranches', 'setrelationships');
	
	//////////////////////////////////////////
	/// START refTrigramArray
	var $refTrigramArray = array(
		'1' => array(
			'3' => '7', // ---
			'2' => '7', // ---
			'1' => '7'  // ---
		),
		'2' => array(
			'3' => '8', // - -
			'2' => '8', // - -
			'1' => '8'  // - -
		),
		'3' => array(
			'3' => '7', // ---
			'2' => '8', // - -
			'1' => '7'  // ---
		),
		'4' => array(
			'3' => '8', // - -
			'2' => '7', // ---
			'1' => '8'  // - -
		),
		'5' => array(
			'3' => '8', // - -
			'2' => '7', // ---
			'1' => '7'  // ---
		),
		'6' => array(
			'3' => '7', // ---
			'2' => '7', // ---
			'1' => '8'  // - -
		),
		'7' => array(
			'3' => '8', // - -
			'2' => '8', // - -
			'1' => '7'  // ---
		),
		'8' => array(
			'3' => '7', // ---
			'2' => '8', // - -
			'1' => '8'  // - -
		),
		
	);/// END refTrigramArray
	
	
	//////////////////////////////////////////
	/// START refTrigrams
	/*
	function refTrigrams(){
		return $this->refTrigramArray;
	}*/
	/// END refTrigrams
	
	
	//////////////////////////////////////////
	/// START needsToMutate // returns true or false
	function needsToMutate($data){
		
		foreach ($data['Trait'] as $level){
			
			$shouldMutateArray[] = $level['traitValue']; 
			
		}
		
		if(in_array(9, $shouldMutateArray) || in_array(6, $shouldMutateArray)){
			
			$shouldMutate = true;
			
		}else{
			
			$shouldMutate = false;
		}
		
		return $shouldMutate;
	
	}
	/// END needsToMutate


	//////////////////////////////////////////
	/// START readDataTraits
	function readDataTraits($data, $whichHexagram = 'main'){
		
		$this->hexTraits = array();
		
		if($whichHexagram == 'mutated'){
		
			$i = 6;
			
			foreach ($data['Trait'] as $level){
				
				if($level['traitValue'] == '6'){
					
					$data['Trait'][$i]['traitValue'] = '7';
					
				}else if($level['traitValue'] == '9'){
					
					$data['Trait'][$i]['traitValue'] = '8';
					
				}
				
				$i--;
				
			}
				
			
			$this->hexTraits = $data['Trait'];
			
		}else if($whichHexagram == 'main'){
			
			$this->hexTraits = $data['Trait'];
			
		}
			

		
		return $this->hexTraits;
		
	}/// END readDataTraits
	
	
	//////////////////////////////////////////
	/// START readDataHexagram
	/*
	function readDataHexagram($data){
		$this->hexData = $data['Hexagram'];
		return $this->hexData;
	}*/
	/// END readDataHexagram


	//////////////////////////////////////////
	/// START reArrangeHexagram
	function reArrangeHexagram($hexTraits){
		$this->reArranged = array();
		foreach($hexTraits as $hexLevel){
			$this->reArranged[$hexLevel['traitPosition']] = $hexLevel['traitValue'];
		}
		return $this->reArranged;
	}/// END reArrangeHexagram


	//////////////////////////////////////////
	/// START switchToOrdinary
	function switchToOrdinary($hexTraits){
	
		$newHexagramTraits = array();
		
		foreach($hexTraits as $level => $value){
			if($value == 6){
				$value = '8';
			}else if($value == 9){
				$value = '7';
			}
			$newHexagramTraits[$level] = $value;
		}
				
		return $newHexagramTraits;
	}// END switchToOrdinary
	
	
	//////////////////////////////////////////
	/// START splitArray
	function splitArray($hexTraits){
		$supTrigram = array_slice($hexTraits, 0, 3, TRUE);
		$infTrigram = array_slice($hexTraits, 3, 3, TRUE);
		
		//
		$i = 3;
		$newSupTrigram = array();
		foreach($supTrigram as $key => $value){
			$newSupTrigram[$i] = $value;
			$i--;
		}
		$supTrigram = $newSupTrigram;		
		// 
		
		$hexTraits ='';
		$hexTraits = array('supTrigram' => $supTrigram, 'infTrigram' => $infTrigram);
		
		return $hexTraits;
	}// END splitArray
	
	
	//////////////////////////////////////////
	/// START findTrigrams
	function findTrigrams($hexTraits){
		$completedArray = $this->reArrangeHexagram($hexTraits);
		$completedArray = $this->switchToOrdinary($completedArray);
		$completedArray = $this->splitArray($completedArray);
		
		
		if(!empty($this->refTrigramArray) && !empty($completedArray)){
			
			foreach($completedArray as $trigramToId => $trigramToIdValues){
				
				foreach($this->refTrigramArray as $trigram => $value){
					
					if ($trigramToIdValues === $value){
										
						$returnedArray[$trigramToId] = $trigram;
						
					}
				}
			}
			
		}else{
			
			$returnedArray = 'Values incomplete';
			
		}		
		
		return $returnedArray;
		
	}// END findTrigrams
	
	
	//////////////////////////////////////////
	/// START findrefHex
	function findrefHex($hexTraits){
		$getIndex = $this->findTrigrams($hexTraits);
		$refHexInstance = ClassRegistry::init('Refhexagram');
		$refhexagram = $refHexInstance->find('first', array('conditions' => array('Refhexagram.supTrigram' => $getIndex['supTrigram'], 'Refhexagram.infTrigram' => $getIndex['infTrigram'])));
		
		return $refhexagram;
	}// END findrefHex
	

	//////////////////////////////////////////
	/// START getDataForHexagram
	function getDataForHexagram($hexTraits){
		$dataForHexagram = array();
		$dataToSetUp = $this->findrefHex($hexTraits);
		$dataForHexagram['refhexagram_id'] = $dataToSetUp['Refhexagram']['id'];
		$dataForHexagram['element'] = $dataToSetUp['Refhexagram']['element'];
		$dataForHexagram['supTrigram'] = $dataToSetUp['Refhexagram']['supTrigram'];
		$dataForHexagram['infTrigram'] = $dataToSetUp['Refhexagram']['infTrigram'];
		
		/**/
		// START isSelf / Other
		foreach($hexTraits as $level){
			if($level['traitPosition'] == $dataToSetUp['Refhexagram']['self']){
				//$trace = $level['traitPosition'];
				$hexTraits[$level['traitPosition']]['isSelf'] = 1;
			}else{
				$hexTraits[$level['traitPosition']]['isSelf'] = 0;
			}
			
			if($level['traitPosition'] == $dataToSetUp['Refhexagram']['other']){
				$hexTraits[$level['traitPosition']]['isOther'] = 1;
			}else{
				$hexTraits[$level['traitPosition']]['isOther'] = 0;
			}
		}
		// END isSelf / Other
		/**/
		
		return $dataToSetUp;
	}// END getDataForHexagram
	
	
	//////////////////////////////////////////
	/// START checkData
		function checkData($data){
		
		// - [Hexagram] => Array ( 
		
		if(empty($data['Hexagram']['anneeTronc']) || empty($data['Hexagram']['anneeBranche'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Hexagram']['moisTronc']) || empty($data['Hexagram']['moisBranche'])){
		
			$dataCheckResult = false;
			
		}else if(empty($data['Hexagram']['jourTronc']) || empty($data['Hexagram']['jourBranche'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][6]['traitValue']) || empty($data['Trait'][6]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][5]['traitValue']) || empty($data['Trait'][5]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][4]['traitValue']) || empty($data['Trait'][4]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][3]['traitValue']) || empty($data['Trait'][3]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][2]['traitValue']) || empty($data['Trait'][2]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else if(empty($data['Trait'][1]['traitValue']) || empty($data['Trait'][1]['traitPosition'])){
			
			$dataCheckResult = false;
			
		}else{
			
			$dataCheckResult = true;
			
		}

		return $dataCheckResult;
	}// END checkData
	
	
	
	
	//////////////////////////////////////////
	/// START doCompleteArray
	function doCompleteArray($data, $whichHexagram = 'main', $parentHexagramElement = '', $parentMausBranches = ''){
		
		// Get the reference hexagram info
		
		$hexTraits = $this->readDataTraits($data, $whichHexagram);
		
		// Tracing and Debugging
		/*
		$reArranged = $this->reArrangeHexagram($hexTraits);
		
		$switched = $this->switchToOrdinary($reArranged);
		
		$splitted = $this->splitArray($switched);
		
		$foundTrigram = $this->findTrigrams($hexTraits);
		
		$foundRefHex = $this->findrefHex($hexTraits);*/
		
		///////////////////////////////////////
		// Launch query to reference
		
		$refHex = $this->findrefHex($hexTraits);
		
		///////////////////////////////////////
		// Change array structure for setBranches component
		
		$refHex = $refHex['Refhexagram'];
		
		$refHex['Hexagram'] = $data['Hexagram'];
		
		
		if($whichHexagram == 'main'){			
			
			$refHex['Trait'] = $data['Trait'];
			
		}else if ($whichHexagram == 'mutated') {

			$refHex['Trait'] = $hexTraits;
			
		}
		
		
		// Setting data from RefHexagram such as hexagram element and hexagram number
		
		$refHex['Hexagram']['element']  = $refHex['element'];
		
		$refHex['Hexagram']['refhexagram_id']  = $refHex['id'];
		
		
		///////////////////////////////////////
		// consult the setBranches compnent
		
		$getBranchData = $this->setbranches->doSetBranches($refHex, $whichHexagram, $parentHexagramElement, $parentMausBranches);
		
		///////////////////////////////////////
		// Change back array structure for saving
		
		// extract arrays Hexagram and Trait to be placed in temporary arrays
		
		$tempHexagram = array();

		// Rebuild Hexagram array
		
		$tempHexagram['Hexagram'] = $getBranchData['Hexagram'];
		
		// Add RefHexagram & Trait
		
		$tempTrait = array();
		
		$tempTrait['Trait'] = $getBranchData['Trait'];
		
		// Clean up RefHexagram
		// Purging data from old array to restructure a new array
		// that data has been stored into temporary arrays 
		// and will be placed back into the new array anyway
		
		unset($getBranchData['Hexagram']);
		unset($getBranchData['Trait']);
		
		// rebuild $this->data variable for saving
		
		$newData = array();
		
		$newData['RefHexagram'] = $getBranchData;
		
		$newData['Hexagram'] = $tempHexagram['Hexagram'];
		
		$newData['Trait'] = $tempTrait['Trait'];	
		
		
		/////
		
		return $newData;
		
		// return $parentMausBranches;
		
		
	}// END doCompleteArray
	
	

	
}

?>