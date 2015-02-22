<?php


class SetrelationshipsComponent extends Object{

	
	var $relationshipArray = array(
		
		'si' => array(
			'Soutien' => 'shen',
			'Blessure' => 'yin',
			'Affrontement' => 'hai'
		),
		'wu' => array(
			'Soutien' => 'wei',
			'Blessure' => 'chou',
			'Affrontement' => 'zi'
		),
		'wei' => array(
			'Soutien' => 'wu',
			'Blessure' => 'zi',
			'Affrontement' => 'chou'
		),
		'shen' => array(
			'Soutien' => 'si',
			'Blessure' => 'hai',
			'Affrontement' => 'yin'
		),
		'you' => array(
			'Soutien' => 'chen',
			'Blessure' => 'xu',
			'Affrontement' => 'mao'
		),
		'xu' => array(
			'Soutien' => 'mao',
			'Blessure' => 'you',
			'Affrontement' => 'chen'
		),
		'hai' => array(
			'Soutien' => 'yin',
			'Blessure' => 'shen',
			'Affrontement' => 'si'
		),
		'zi' => array(
			'Soutien' => 'chou',
			'Blessure' => 'wei',
			'Affrontement' => 'wu'
		),
		'chou' => array(
			'Soutien' => 'zi',
			'Blessure' => 'wu',
			'Affrontement' => 'wei'
		),
		'yin' => array(
			'Soutien' => 'hai',
			'Blessure' => 'si',
			'Affrontement' => 'shen'
		),
		'mao' => array(
			'Soutien' => 'xu',
			'Blessure' => 'chen',
			'Affrontement' => 'you'
		),
		'chen' => array(
			'Soutien' => 'you',
			'Blessure' => 'mao',
			'Affrontement' => 'xu'
		)
	);

	
	////////////////////////////////////////////////////////////
	/// START buildComparisonArray
	function buildComparisonArray($completedArray = '', $mutatedArray = ''){
		
		
		$i = 1;
		
		foreach ($completedArray['Trait'] as $level){

			$comparisonArray[$i]['nb'] = $i;
			$comparisonArray[$i]['branch'] = $level['branche'];
			
			if ($level['isSelf'] == 1 || $level['isEffUtil'] == 1) {
				$comparisonArray[$i]['specialBranch'] = 1;				
			}else{
				$comparisonArray[$i]['specialBranch'] = 0;
			}
			
			$i++; // Putting the 1st. set of branches into the array
			
		}
		
		if (!empty($mutatedArray)) {
			
			foreach ($mutatedArray['Trait'] as $level){
				
			$comparisonArray[$i]['nb'] = $i;
			$comparisonArray[$i]['branch'] = $level['branche'];
			
				if ($level['isSelf'] == 1 || $level['isEffUtil'] == 1) {
					$comparisonArray[$i]['specialBranch'] = 1;				
				}else{
					$comparisonArray[$i]['specialBranch'] = 0;
					
				}
				
				// $comparisonArray[$i] = $level['branche'];
				
				$i++; // Putting the 2nd. set of branches into the array
				
			}
			
		}
		
		return $comparisonArray;
		
	}/// END buildComparisonArray
	

	
	////////////////////////////////////////////////////////////
	/// START doCompareOperation
	function doCompareOperation($comparisonArray){
		
		$compareResult = array();
		
		$i = 1;
		
		foreach($comparisonArray as $currentBranchKey){
			
			$currentIndex = $currentBranchKey['nb'];
			$currentBranch = $currentBranchKey['branch'];
			$currentSpecialBranch = $currentBranchKey['specialBranch'];
			
			$branchSoutien = $this->relationshipArray[$currentBranch]['Soutien'];
			$branchBlessure = $this->relationshipArray[$currentBranch]['Blessure'];
			$branchAffrontement = $this->relationshipArray[$currentBranch]['Affrontement'];
			
			foreach ($comparisonArray as $otherBranchKey){
				
				$otherIndex = $otherBranchKey['nb'];
				$otherBranch = $otherBranchKey['branch'];	
				$otherSpecialBranch = $otherBranchKey['specialBranch'];
				
				$specialBranchStatus = ($currentBranchKey['specialBranch'] + $otherBranchKey['specialBranch']);
				
				if ($branchSoutien == $otherBranch) {
					
					$compareResult[] = array('firstTrait' => $currentIndex, 'secondTrait' => $otherIndex, 'relationshipType' => 'Soutien', 'specialBranchStatus' => $specialBranchStatus);
					
				}else if ($branchBlessure == $otherBranch) {
					
					$compareResult[] = array('firstTrait' => $currentIndex, 'secondTrait' => $otherIndex, 'relationshipType' => 'Blessure', 'specialBranchStatus' => $specialBranchStatus);
				
				}else if ($branchAffrontement == $otherBranch) {
					
					$compareResult[] = array('firstTrait' => $currentIndex, 'secondTrait' => $otherIndex, 'relationshipType' => 'Affrontement', 'specialBranchStatus' => $specialBranchStatus);
					
				}
				
				
			}
			
			
			
			unset($comparisonArray[$i]); // get current branch out og the array so that only compares to other values
			
			$i++;
			
		}
		
		return $compareResult;
		
	}/// END doCompareOperation
	
	
	
	////////////////////////////////////////////////////////////
	/// START doSetrelationships
	function doSetrelationships($completedArray = '', $mutatedArray = ''){
		
		// get a comparison array from main and mutated hexagram
		$comparisonArray = $this->buildComparisonArray($completedArray, $mutatedArray);
		
		// do compare operation
		$compareResult = $this->doCompareOperation($comparisonArray);
		
		return $compareResult;
		
	}/// END doSetrelationships
	
	
	
}


?>