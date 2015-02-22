<?php
	
class ReadHexagramsComponent extends Object{
	
		
	////////////////////////////////////////////
	/// START findHexagramId
	function findHexagramId($hexagram){
		$hexagram_id = $hexagram['Hexagram']['id'];
		return $hexagram_id;	
	}/// END findHexagramId
	
	
	////////////////////////////////////////////
	/// START findDBTraits
	function findDBTraits($hexagram_id){
		$DBTraitsInstance = ClassRegistry::init('Trait');
		$DBTraits = $DBTraitsInstance->find('all', array('order' => 'Trait.traitPosition DESC', 'conditions' => array('Trait.hexagram_id' => $hexagram_id), 'recursive' => -1));
		return $DBTraits;	
	}/// END findDBTraits
	
	
	////////////////////////////////////////////
	/// START cleanUpTrait
	function cleanUpTrait($traitArray){
		
		$i= 6;
		
		foreach($traitArray as $key => $value){
			$cleanedUpTraitArray[$i] = $value['Trait'];
			$i--;
		}
		
		return $cleanedUpTraitArray;	
	}/// END cleanUpTrait
	
	
	////////////////////////////////////////////
	/// START doReadHexagrams
	function doReadHexagrams($hexagram){
		
		// find hexagram_id
		$hexagram_id = $this->findHexagramId($hexagram);
		
			
		//////////////////////////////////////////////////////////////
		// fetching all data
		
		// reading childHexagram	
		if (empty($hexagram['ChildHexagram']['id'])) {
			$childHexagram = '';
		}else{
			$childHexagram = $hexagram['ChildHexagram'];
		}
			
		
		// find hexagram_id for childHexagram		
		if (!empty($childHexagram)) {
			$childHexagramId =  $hexagram['ChildHexagram']['id'];
		}
		
		// reading mutated or child traits 
		if (!empty($childHexagram)) {
			$mutatedDBTraits = $this->findDBTraits($childHexagramId);
		}	

		
		//////////////////////////////////////////////////////////////
		// Setting or resetting data
		
			
		// Set $mutatedTraits
		if (!empty($childHexagram)) {
			$hexagram['mutatedTraits'] = $mutatedDBTraits;
		}else{
			$hexagram['mutatedTraits'] = '';
		}

		
		//////////////////////////////////////////////////////////////
		// cleaning up all data
				
		// clean up mutated Trait
		if (!empty($childHexagram)) {
			$mutatedTraitCleanup = $this->cleanUpTrait($hexagram['mutatedTraits']);
			unset($hexagram['mutatedTraits']);
			$hexagram['mutatedTraits'] = $mutatedTraitCleanup;
		}
		
		// return $hexagram['mutatedTraits'];
		
		return $hexagram;
		
	}/// END doReadHexagrams
	
}

?>