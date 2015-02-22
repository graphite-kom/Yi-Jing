<?php

class DateselectHelper extends AppHelper{

	///////////////////////////////////////////////////////////
	// START troncMakeOptions
	function troncMakeOptions($troncs){
		
		foreach($troncs as $tronc){
			
			$ceTroncLa = $tronc['Tronc']['tronc'];
			$options[$ceTroncLa] = $ceTroncLa ;
		
		}
		
		return $options;
	}// END troncMakeOptions
	
	///////////////////////////////////////////////////////////
	// START brancheMakeOptions
	function brancheMakeOptions($branches){
		
		foreach($branches as $branche){
			
			$cetteBrancheLa = $branche['Branche']['branche'];
			$options[$cetteBrancheLa] = $cetteBrancheLa ;
		
		}
		return $options;
	}// END brancheMakeOptions
	
	

}

?>