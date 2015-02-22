<?php

class setbranchesComponent extends Object{
	
	

	var $branchesArray = array(
		'topBranches' => array('zi', 'yin', 'chen', 'wu', 'shen', 'xu'),
		'topBranchElements' => array('water', 'wood', 'earth', 'fire', 'metal', 'earth'),
		'bottomBranches' => array('hai', 'you', 'wei', 'si', 'mao', 'chou'),
		'bottomBranchesBranchElements' => array('water', 'metal', 'earth', 'fire', 'wood', 'earth'),
		'allElements' => array(1 => 'earth', 2 => 'metal', 3 => 'water', 4 => 'wood', 5 => 'fire')
	);

	var $chCalendar = array(
		'jia' => array('zi','xu','shen','wu','chen','yin'),
		'yi' => array('chou','hai','you','wei','si','mao'),
		'bing' => array('yin','zi','xu','shen','wu','chen'),
		'ding' => array('mao','chou','hai','you','wei','si'),
		'whu' => array('chen','yin','zi','xu','shen','wu'),
		'ji' => array('si','mao','chou','hai','you','wei'),
		'geng' => array('wu','chen','yin','zi','xu','shen'),
		'xin' => array('wei','si','mao','chou','hai','you'),
		'ren' => array('shen','wu','chen','yin','zi','xu'),
		'gui' => array('you','wei','si','mao','chou','hai')
	);

	////////////////////////////////////////////////////////////
	/// START declareVariables
	function declareVariables($hexagram){
		$this->branch4 = $hexagram['level4branch'];
		$this->branch1 = $hexagram['level1branch'];
		$this->topBranches = $this->branchesArray['topBranches'];
		$this->bottomBranches = $this->branchesArray['bottomBranches'];
	}/// END declareVariables


	////////////////////////////////////////////////////////////
	/// START getBranchLocation
	function getBranchLocation($hexagram){

		$this->declareVariables($hexagram);
			
		if(isset($this->branch1) && isset($this->branch4)){
				
			$branchLocation = array();
				
			if(!empty($this->topBranches) && !empty($this->bottomBranches)){
				
				if(is_int(array_search($this->branch1, $this->topBranches))){
					$branchNbInf = array_search($this->branch1, $this->topBranches);
					$branchLocation['branchInfSet'] = 'topBranches';
					$branchLocation['branchInfIndex'] = $branchNbInf;
				}else if(is_int(array_search($this->branch1, $this->bottomBranches))){
					$branchNbInf = array_search($this->branch1, $this->bottomBranches);
					$branchLocation['branchInfSet'] = 'bottomBranches';
					$branchLocation['branchInfIndex'] = $branchNbInf;
				}
				
				
				if(is_int(array_search($this->branch4, $this->topBranches))){
					$branchNbSup = array_search($this->branch4, $this->topBranches);
					$branchLocation['branchSupSet'] = 'topBranches';
					$branchLocation['branchSupIndex'] = $branchNbSup;
				}else if(is_int(array_search($this->branch4, $this->bottomBranches))){
					$branchNbSup = array_search($this->branch4, $this->bottomBranches);
					$branchLocation['branchSupSet'] = 'bottomBranches';
					$branchLocation['branchSupIndex'] = $branchNbSup;
				}
				/*/**/

			}else{
				$branchLocation = $this->branch1.' - '.$this->branch4.'info missing - 2';
			}
				
		}else{
			$branchLocation = $this->branch1.' - '.$this->branch4.'info missing - 3';
		}

		return $branchLocation;

	}/// END getBranchLocation


	////////////////////////////////////////////////////////////
	/// START getProperIndex
	function getProperIndex($hexagram){
		$intanciateArray = $this->getBranchLocation($hexagram);

		$branchInf = array();
		$branchSup = array();

		$infIndex = $intanciateArray['branchInfIndex'];
		$supIndex = $intanciateArray['branchSupIndex'];

		if(is_int($infIndex)){
			for($i = 0; $i < 3; $i++){

				if(($infIndex + $i) > 5){
					$branchInf['keys'][] = ($infIndex + $i) - 5;
				}else{
					$branchInf['keys'][] = ($infIndex + $i);
				}
			}
		}

		if(is_int($supIndex)){
			for($i = 0; $i < 3; $i++){

				if(($supIndex + $i) > 5){
					$branchSup['keys'][] = ($supIndex + $i) - 5;
				}else{
					$branchSup['keys'][] = ($supIndex + $i);
				}
			}
		}

		$trigramIndexes = array('branchSup' => $branchSup, 'branchInf' => $branchInf);

		return $trigramIndexes;
	}/// END getProperIndex


	////////////////////////////////////////////////////////////
	/// START hexElementIndex
	function hexElementIndex($hexagram, $whichHexagram = 'main', $parentHexagramElement = ''){

		if ($whichHexagram == 'main') {
			$hexElement = $hexagram['element'];
		}else if ($whichHexagram == 'mutated'){
			$hexElement = $parentHexagramElement;
		}

		$hexElementIndex = array_search($hexElement, $this->branchesArray['allElements']);

		return $hexElementIndex;
	}/// END hexElementIndex


	////////////////////////////////////////////////////////////
	/// START returnParentHood
	function returnParentHood($element, $hexagram, $whichHexagram = 'main', $parentHexagramElement = ''){

		////////////////////////////////////////////////////////////
		/*
		 var $branchesArray = array(
			'topBranches' => array('zi', 'yin', 'chen', 'wu', 'shen', 'xu'),
			'topBranchElements' => array('water', 'wood', 'earth', 'fire', 'metal', 'earth'),
			'bottomBranches' => array('hai', 'you', 'wei', 'si', 'mao', 'chou'),
			'bottomBranchesBranchElements' => array('water', 'metal', 'earth', 'fire', 'wood', 'earth'),
			'allElements' => array(1 => 'earth', 2 => 'metal', 3 => 'water', 4 => 'wood', 5 => 'fire')
			);*/
		////////////////////////////////////////////////////////////

		$hexElementIndex = $this->hexElementIndex($hexagram, $whichHexagram, $parentHexagramElement);

		$elementIndex = array_search($element, $this->branchesArray['allElements']);

		$traceParentFigure =($elementIndex - $hexElementIndex);

		if($parentFigure =($elementIndex - $hexElementIndex)){
			if(($elementIndex - $hexElementIndex) > 2){
				$parentFigure = ($elementIndex - $hexElementIndex) - 5;
			}else if(($elementIndex - $hexElementIndex) < -2){
				$parentFigure = ($elementIndex - $hexElementIndex) + 5;
			}
				
		}

		switch($parentFigure){
			case -2:
				$parentHood = 'officiel';
				break;
			case -1:
				$parentHood = 'parent';
				break;
			case 0:
				$parentHood = 'brother';
				break;
			case 1:
				$parentHood = 'child';
				break;
			case 2:
				$parentHood = 'wealth';
				break;
		}

		/// tracing  result
		/*
		 echo '<br/><br/>$hexElementIndex (the hexagram element)<br/>'.$hexagram['element'].' ';
		 var_dump($hexElementIndex);
		 echo '<br/>$elementIndex (this element)<br/>'.$element.' ';
		 var_dump($elementIndex);
		 echo '<br/>$parentFigure<br/>';
		 var_dump($parentFigure);
		 echo '<br/>';*/

		return $parentHood;
	}/// END returnParentHood


	////////////////////////////////////////////////////////////
	/// START returnTNState
	function returnTNState($dateIndex, $branch){

		switch($dateIndex){
			case 0:
				if($branch == 'xu' || $branch == 'hai'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;

			case 1:
				if($branch == 'shen' || $branch == 'you'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;
					
			case 2:
				if($branch == 'wu' || $branch == 'wei'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;
					
			case 3:
				if($branch == 'chen' || $branch == 'si'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;
					
			case 4:
				if($branch == 'yin' || $branch == 'mao'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;
					
			case 5:
				if($branch == 'zi' || $branch == 'chou'){
					$this->TNState = 1;
				}else{
					$this->TNState = 0;
				}
				break;
		}

		return $this->TNState;

	}/// END returnTNState


	////////////////////////////////////////////////////////////
	/// START findTN
	function findTN($branch, $hexagram){
		$findTNState = array();
		$chDate = $hexagram['Hexagram'];

		$anneeTronc = strtolower($chDate['anneeTronc']);
		$anneeBranche = strtolower($chDate['anneeBranche']);

		$moisTronc = strtolower($chDate['moisTronc']);
		$moisBranche = strtolower($chDate['moisBranche']);

		$jourTronc = strtolower($chDate['jourTronc']);
		$jourBranche = strtolower($chDate['jourBranche']);

		/////

		if(in_array($jourBranche, $this->chCalendar[$jourTronc])){
			$jourIndex= array_search($jourBranche, $this->chCalendar[$jourTronc]);

			$findTNState['trouNoirJour'] = $this->returnTNState($jourIndex, $branch);
				
		}else{
			$findTNState['trouNoirJour'] = 0;
		}

		if(in_array($moisBranche, $this->chCalendar[$moisTronc])){
			$moisIndex = array_search($moisBranche, $this->chCalendar[$moisTronc]);
				
			$findTNState['trouNoirMois'] = $this->returnTNState($moisIndex, $branch);

		}else{
			$findTNState['trouNoirMois'] = 0;
		}

		if(in_array($anneeBranche, $this->chCalendar[$anneeTronc])){
			$anneeIndex = array_search($anneeBranche, $this->chCalendar[$anneeTronc]);
				
			$findTNState['trouNoirAnnee'] = $this->returnTNState($anneeIndex, $branch);
				
		}else{
			$findTNState['trouNoirAnnee'] = 0;
		}

		return $findTNState;
	}/// END findTN


	////////////////////////////////////////////////////////////
	/// START placeAnimals
	function placeAnimals($hexagram){
		
		$animalArray = array();
		
		$jourTonc = strtolower($hexagram['Hexagram']['jourTronc']);
		
		$jiaYi = array(1 => 'Green Dragon', 2 => 'Red Bird', 3 => 'Yellow Scorpion', 4 => 'Gray Serpent', 5 => 'White Tiger', 6 => 'Black Turtle');
		$bingDing = array(1 => 'Red Bird', 2 => 'Yellow Scorpion', 3 => 'Gray Serpent', 4 => 'White Tiger', 5 => 'Black Turtle', 6 => 'Green Dragon');
		$whu = array(1 => 'Yellow Scorpion', 2 => 'Gray Serpent', 3 => 'White Tiger', 4 => 'Black Turtle', 5 => 'Green Dragon', 6 => 'Red Bird');
		$ji = array(1 => 'Gray Serpent', 2 => 'White Tiger', 3 => 'Black Turtle', 4 => 'Green Dragon', 5 => 'Red Bird', 6 => 'Yellow Scorpion');
		$gengXin = array(1 => 'White Tiger', 2 => 'Black Turtle', 3 => 'Green Dragon', 4 => 'Red Bird', 5 => 'Yellow Scorpion', 6 => 'Gray Serpent');
		$renGui = array(1 => 'Black Turtle', 2 => 'Green Dragon', 3 => 'Red Bird', 4 => 'Yellow Scorpion', 5 => 'Gray Serpent', 6 => 'White Tiger');
		
		switch($jourTonc){
			case 'jia':
				$animalArray = $jiaYi;
				break;
			case 'yi':
				$animalArray = $jiaYi;
				break;
			case 'bing':
				$animalArray = $bingDing;
				break;
			case 'ding':
				$animalArray = $bingDing;
				break;
			case 'whu':
				$animalArray = $whu;
				break;
			case 'ji':
				$animalArray = $ji;
				break;
			case 'geng':
				$animalArray = $gengXin;
				break;
			case 'xin':
				$animalArray = $gengXin;
				break;
			case 'ren':
				$animalArray = $renGui;
				break;
			case 'gui':
				$animalArray = $renGui;
				break;
			
		}
		
		return $animalArray;

	}/// END placeAnimals
	
	
	////////////////////////////////////////////////////////////
	/// START findHexToHexParenthood
	function findHexToHexParenthood($hexagram, $whichHexagram = 'main', $parentHexagramElement = ''){
		
		if ($whichHexagram == 'mutated') {
			
			
			$mutatedHexagramElement = $hexagram['Hexagram']['element'];
			
			$mutatedHexagramElementIndex = array_search($mutatedHexagramElement, $this->branchesArray['allElements']);
			
			$parentHexagramElementIndex = array_search($parentHexagramElement, $this->branchesArray['allElements']);
			
			/* tracing
			$mutatedHexagramElementIndex = 1;
			
			$parentHexagramElementIndex = 4; 
			*/// 'allElements' => array(1 => 'earth', 2 => 'metal', 3 => 'water', 4 => 'wood', 5 => 'fire')
			
			if($parentFigure =($mutatedHexagramElementIndex - $parentHexagramElementIndex)){
				if(($mutatedHexagramElementIndex - $parentHexagramElementIndex) > 2){
					$parentFigure = ($mutatedHexagramElementIndex - $parentHexagramElementIndex) - 5;
				}else if(($mutatedHexagramElementIndex - $parentHexagramElementIndex) < -2){
					$parentFigure = ($mutatedHexagramElementIndex - $parentHexagramElementIndex) + 5;
				}
					
			}
			
			switch($parentFigure){
				case -2:
					$parentHood = 'officiel';
					break;
				case -1:
					$parentHood = 'parent';
					break;
				case 0:
					$parentHood = 'brother';
					break;
				case 1:
					$parentHood = 'child';
					break;
				case 2:
					$parentHood = 'wealth';
					break;
			}
		
		}
		
		
		//$hexElementIndex = array_search($parentHexElement, $this->branchesArray['allElements']);
		
		
		return $parentHood;
		
	}/// END findHexToHexParenthood

	////////////////////////////////////////////////////////////
	/// START doSetUpTheBranches
	function doSetUpTheBranches($hexagram,$whichHexagram = 'main',$parentHexagramElement = ''){
		////////////////////////////////////////////////////////////
		/*
		 array
		 'branchInfSet' => string 'bottomBranches' (length=14)
		 'branchInfIndex' => int 2
		 'branchSupSet' => string 'topBranches' (length=11)
		 'branchSupIndex' => int 3
		 */
		////////////////////////////////////////////////////////////

		$trigramIndexes = $this->getProperIndex($hexagram);
		$branchSet = $this->getBranchLocation($hexagram);
		$hexagramBranches = array();

		$i = 1;

		foreach($trigramIndexes['branchInf']['keys'] as $index){
			if($branchSet['branchInfSet'] == 'topBranches'){
				$hexagramBranches['levelbranch'][$i] = $this->branchesArray['topBranches'][$index];
				$hexagramBranches['levelelement'][$i]  = $this->branchesArray['topBranchElements'][$index];
				// $hexagramBranches['level'.$i.'branch'] = $index;
			}else{
				$hexagramBranches['levelbranch'][$i] = $this->branchesArray['bottomBranches'][$index];
				$hexagramBranches['levelelement'][$i] = $this->branchesArray['bottomBranchesBranchElements'][$index];
				// $hexagramBranches['level'.$i.'branch'] = $index;
			}
			$i++;
		}

		foreach($trigramIndexes['branchSup']['keys'] as $index){
			if($branchSet['branchSupSet'] == 'topBranches'){
				$hexagramBranches['levelbranch'][$i] = $this->branchesArray['topBranches'][$index];
				$hexagramBranches['levelelement'][$i] = $this->branchesArray['topBranchElements'][$index];
				// $hexagramBranches['level'.$i.'branch'] = $index;
			}else{
				$hexagramBranches['levelbranch'][$i] = $this->branchesArray['bottomBranches'][$index];
				$hexagramBranches['levelelement'][$i] = $this->branchesArray['bottomBranchesBranchElements'][$index];
				// $hexagramBranches['level'.$i.'branch'] = $index;
			}
			$i++;
		}

		$y = 1;

		foreach($hexagramBranches['levelelement'] as $element){
			$hexagramBranches['levelparenthood'][$y] = $this->returnParentHood($element, $hexagram, $whichHexagram, $parentHexagramElement);
			$y++;
		}


		$z = 1;
		
		$animalArray = $this->placeAnimals($hexagram);
		
		foreach($hexagramBranches['levelbranch'] as $branch){
			$this->findTNState =  $this->findTN($branch, $hexagram);
			$hexagramBranches['levelTNjour'][$z] = $this->findTNState['trouNoirJour'];
			$hexagramBranches['levelTNmois'][$z] = $this->findTNState['trouNoirMois'];
			$hexagramBranches['levelTNannee'][$z] = $this->findTNState['trouNoirAnnee'];
			
			if($z == $hexagram['self']){
				$hexagramBranches['levelIsSelf'][$z] = 1;
			}else{
				$hexagramBranches['levelIsSelf'][$z] = 0;				
			}
			
			if($z == $hexagram['other']){
				$hexagramBranches['levelIsOther'][$z] = 1;
			}else{
				$hexagramBranches['levelIsOther'][$z] = 0;				
			}
			
			$hexagramBranches['levelAnimal'][$z] = $animalArray[$z];
			
			
			$z++;
		}


		return $hexagramBranches;

	}/// END doSetUpTheBranches
	
	
	////////////////////////////////////////////////////////////
	/// START inputBranchData
	function inputBranchData($hexagram,$whichHexagram = 'main',$parentHexagramElement = '', $parentMausBranches = ''){
		
		$hexagramBranches = $this->doSetUpTheBranches($hexagram,$whichHexagram,$parentHexagramElement);

		$i = 6;

		foreach($hexagram['Trait'] as $level){
			// echo $level['traitPosition'].' => '.$hexagramBranches['levelbranch'][$i].'<br/>';
			$hexagram['Trait'][$i]['branche'] = $hexagramBranches['levelbranch'][$i];
			$hexagram['Trait'][$i]['element'] = $hexagramBranches['levelelement'][$i];
			$hexagram['Trait'][$i]['parente'] = $hexagramBranches['levelparenthood'][$i];
			$hexagram['Trait'][$i]['trouNoirJour'] = $hexagramBranches['levelTNjour'][$i];
			$hexagram['Trait'][$i]['trouNoirMois'] = $hexagramBranches['levelTNmois'][$i];
			$hexagram['Trait'][$i]['trouNoirAnnee'] = $hexagramBranches['levelTNannee'][$i];
			$hexagram['Trait'][$i]['isSelf'] = $hexagramBranches['levelIsSelf'][$i];
			$hexagram['Trait'][$i]['isOther'] = $hexagramBranches['levelIsOther'][$i];
			$hexagram['Trait'][$i]['animal'] = $hexagramBranches['levelAnimal'][$i];
			
			if ($hexagram['Trait'][$i]['parente'] == $hexagram['Hexagram']['efficaceUtilitaire']) {
				$hexagram['Trait'][$i]['isEffUtil'] = 1;
			}else{
				$hexagram['Trait'][$i]['isEffUtil'] = 0;
			}
			
			$i--;
		}

		if ($whichHexagram == 'mutated') {
			$hexagram['Hexagram']['hexToHexParenthood'] = $this->findHexToHexParenthood($hexagram, $whichHexagram, $parentHexagramElement);
		}else{
			$hexagram['Hexagram']['hexToHexParenthood'] = 'none';
		}
		
		/*
		if ($whichHexagram == 'main') {
			$hexagram = $this->findIfIsMaus($hexagram,$whichHexagram,$parentHexagramElement, $parentMausBranches);
		}*/
		
		$hexagram = $this->findIfIsMaus($hexagram,$whichHexagram,$parentHexagramElement, $parentMausBranches);
		///
		
		return $hexagram;
		
	}/// END inputBranchData


	
	
	////////////////////////////////////////////////////////////
	/// START buildMausArray
	function buildMausArray($hexagram,$whichHexagram = 'main',$parentHexagramElement = ''){
		
		///
		
		$mausArray = array();
		
		//////// Extract all earth mutating branches
		
		$i = 6;
		
		foreach($hexagram['Trait'] as $level){
			
			$traitValue = $hexagram['Trait'][$i]['traitValue'];
			$traitBranche = $hexagram['Trait'][$i]['branche'];
			$traitElement = $hexagram['Trait'][$i]['element'];
			
			if (($traitValue == 6 || $traitValue == 9) && $traitElement == 'earth') {
				$mausArray[] = $traitBranche;
			}
			
			$i--;
			
		}
		
		//////// Set all corresponding branches to maus
		
		$mausBranches = array();
		
		foreach($mausArray as $key => $earthMutatingBranch){
			
			switch ($earthMutatingBranch) {
				case 'chou':

					array_push($mausBranches, 'shen', 'you');
					
					break;
				
					case 'xu':
						
						array_push($mausBranches, 'si','wu');
						
						break;
					
					case 'wei':
	
						array_push($mausBranches, 'mao','yin');
						
						break;
					
					case 'chen':
	
						array_push($mausBranches, 'zi','hai');
						
						break;
	
				}
				
			}	
			
			return $mausBranches;
			
			///
			
	
	}/// END buildMausArray
	
	
	////////////////////////////////////////////////////////////
	/// START findIfIsMaus
	function findIfIsMaus($hexagram,$whichHexagram = 'main',$parentHexagramElement = '', $parentMausBranches = ''){
		
		/// instance of buildMausArray or use parent mausArray
		
		if ($whichHexagram == 'main') {
			
			$mausBranches = $this->buildMausArray($hexagram,$whichHexagram,$parentHexagramElement);
		
		}else if($whichHexagram == 'mutated'){
			
			$mausBranches = $parentMausBranches;
			
		}
		
		
		
		//////// input maus branches into $hexagram['Trait']
		
		$i = 6;
		
		foreach($hexagram['Trait'] as $level){
			
			$traitBranche = $hexagram['Trait'][$i]['branche'];
			
			if (in_array($traitBranche, $mausBranches) ) {
				
				$hexagram['Trait'][$i]['isMaus'] = 1;
				
			}else{
				
				$hexagram['Trait'][$i]['isMaus'] = 0;
				
			}
			
			$i--;
			
		}
		
		/////// Save $mausBranches into parent hexagram for child hexagram maus
		
		$hexagram['Hexagram']['mausBranches'] = $mausBranches;
		
		
		/////// return new value
		
		return $hexagram;
		
		
	}/// END findIfIsMaus
	
	
	////////////////////////////////////////////////////////////
	/// START doSetBranches
	function doSetBranches($hexagram,$whichHexagram = 'main',$parentHexagramElement = '', $parentMausBranches = ''){
		
		$newHexagram = $this->inputBranchData($hexagram,$whichHexagram,$parentHexagramElement, $parentMausBranches);
		
		return $newHexagram;
	}/// END doSetBranches

	
			
	
	
}

?>