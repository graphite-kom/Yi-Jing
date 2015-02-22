<?php

class setFlashDataComponent extends Object{
	
	
	////////////////////////////////////////////////
	/// START renumberArray
	function renumberArray($relationships) {
		
		$i = 1;
		
		foreach($relationships as $relationship){
			
			$newArray[$i] = $relationship;
			
			$i++;
			
		}	
		
		$relationships = array();
		
		$relationships = $newArray;
		
		return $relationships;
	
	}/// END renumberArray
		
	
		
	////////////////////////////////////////////////
	/// START defineSides
	function defineSides($relationshipElement) {
		
		$first = $relationshipElement['Relationship']['firstTrait'];
		
		$second = $relationshipElement['Relationship']['secondTrait'];
		
		if (($first <= 6) && ($second <=6)) {
			
			$elementSides = 'lftlft';
			
		}else if(($first <= 6) && ($second > 6)){
			
			$elementSides = 'lftrgt';
			
		}else if(($first > 6) && ($second > 6)){
			
			$elementSides = 'rgtrgt';
			
		}
		
		return $elementSides;
	
	}/// END defineSide
	
	
	////////////////////////////////////////////////
	/// START completeRelationshipArray
	function completeRelationshipArray($relationships) {
		
		$newArray = array();
					
		foreach ($relationships as $relationship){
			
			$sides = $this->defineSides($relationship);
			
			////
			
			$newArray[] = $relationship['Relationship']['firstTrait'];
			$newArray[] = $relationship['Relationship']['secondTrait'];
			$newArray[] = $relationship['Relationship']['relationshipType'];
			$newArray[] = $relationship['Relationship']['specialBranchStatus'];
			$newArray[] = $sides;
					
		}
		
		return $newArray;
	
	}/// END completeRelationshipArray
	
	
		
	////////////////////////////////////////////////
	/// START writeForFlash
	function writeForFlash($relationships) {
		
		$newString = 'relationshipData=';
		
		foreach ($relationships as $relationship){

			$newString .= '|';
			
			$newString .= $relationship;

		}
		
		$newString .= '|dataEND';
		
		return $newString;
	
	}/// END writeForFlash
	
	
	
	////////////////////////////////////////////////
	/// START doSetFlashData
	function doSetFlashData($relationships) {
		
		$relationships = $this->renumberArray($relationships);
		
		$relationships = $this->completeRelationshipArray($relationships);
		
		$relationships = $this->writeForFlash($relationships);
		
		return $relationships;
	
	}/// END doSetFlashData
	
}

?>