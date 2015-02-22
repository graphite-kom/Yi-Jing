<?php

class MakeniceHelper extends AppHelper{


	///////////////////////////////////////////////////////////
	// START findType
	function findType($unknownVar){
	
		$this->unknownVar = $unknownVar;
		
		$this->varType = strtoupper(gettype($this->unknownVar));
		// $this->varType = ucwords(gettype($this->unknownVar));
		
		return $this->varType;
		
	}// END findType
	

	///////////////////////////////////////////////////////////
	// START isValid
	function isValid($unknownVar){
	
		$this->unknownVar = $unknownVar;
		
		// START is empty ?
		if(empty($this->unknownVar)){
		
			if(is_numeric($this->unknownVar)){
				if($this->unknownVar === 0){
					$this->validity .= '0';
				}else if($this->unknownVar === '0'){
					$this->validity .= '"0" (STRING)';
				}
				$this->validity .= ' (NUMERIC)';
				
			}else if(is_bool($this->unknownVar)){
				if ($this->unknownVar === false){
					$this->validity .= 'false';
				}
				$this->validity .= ' (BOOLEAN)';
				
			}else if($this->unknownVar == ""){
				$this->validity .= 'Variable (EMPTY STRING)';
				
			}else if(is_array($this->unknownVar)){
				$this->validity .= 'Array (EMPTY)';
				
			}else if(is_null($this->unknownVar)){
				$this->validity .= 'Unset variable (or NULL)';
			}

		}	// END is empty ?
			// START else return true
			// as variable is valid and
			// not empty
		else{
		
			$this->validity = TRUE;
			
		}
			
		return $this->validity;
	}// END isValid
	
	
	
	///////////////////////////////////////////////////////////
	// START divUp
	function divUp($nakedElement){
		$this->element = $nakedElement;
		$this->divHead = '<div style="margin-left:35px; clear:both;">&bull; &nbsp;';
		$this->divTail = '</div>';
		$this->divedUp = $this->divHead.$this->element.$this->divTail;
		return $this->divedUp;
	}// END divUp
	


	///////////////////////////////////////////////////////////
	// START makenice
	function makenice($unknownVar){
	
		$this->unknownVar = $unknownVar;
			
		//$this->mapElement .= 'Results : <br/>';
		
		$this->checkedVar = $this->isValid($this->unknownVar);
	
		if($this->checkedVar == 1){
		
			if(is_array($this->unknownVar)){
				
				$totalRows = count($this->unknownVar);
				$i= 1;
				
				foreach($this->unknownVar as $key => $value){
					
					if(is_array($value)){
						$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0;">'.$i.' - ['.$key.'] => '.$value.' (&nbsp;';
						$this->makenice($value);
						// $this->mapElement .= ')</div>';
						
						if($i < $totalRows){
							$this->mapElement .= '), &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px;"> - (end <strong>'.$key.'</strong>)</span></div>';
						}else{
							$this->mapElement .= ') &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px;"> - (end <strong>'.$key.'</strong>)</span></div>';
						}
						
					}else{
						$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0">'.$i.' - ['.$key.'] => '.$value.'&nbsp;';
						if($i < $totalRows){
							$this->mapElement .= ',</div>';
						}else{
							$this->mapElement .= '</div>';						
						}

					}
					
					$i++;

				}
				
			
			}else{
				$this->varType = $this->findType($this->unknownVar);
				
				$this->tempMapElement = $this->unknownVar.' ('.$this->varType.')';
				
				$this->mapElement .= $this->divUp($this->tempMapElement);
								
			}
			
		}else{	// Variable is not Valid (empty, null, undefined etc ...)
			$this->mapElement .= $this->divUp($this->validity);
		}
		
		return $this->mapElement;
		
	}// END makenice

	
	///////////////////////////////////////////////////////////
	// START dataMap
	function doDataMap($unknownVar){
		
		$this->dataMap .= '<!-- START Data Map -->';
		$this->dataMap .= '<div id="hidden" style="background-color:#006666;clear:both; width:336px; margin:10px 0 0 0;" onclick="javascript:showMakenice();">';
		$this->dataMap .= '<div style="margin:0 20px; padding:10px 0; color:ffffff;">Show Data Map +</div>';
		$this->dataMap .= '</div>';
		$this->dataMap .= '<div id="shown" style="background-color:#006666; clear:both; display:none; color:fff; float:left; padding:0px 5px 5px 5px; margin:10px 0 0 0;">';
		$this->dataMap .= '<div style="margin:0 20px; padding:10px 0 3px 0;" onclick="javascript:hideMakenice();">Hide Data Map -</div>';
				
			////
			$this->dataMap .= '<table border="0" cellspacing="0" cellpadding="0">';
			$this->dataMap .= ' <tr>';
			
				if(is_array($unknownVar)){
				
					////
					foreach($unknownVar as $key => $value){
						$this->dataMap .= '<td style="border:5px solid #006666; background-color:#036e6e;">';
						$this->dataMap .= 'Result for <strong>"'.$key.'"</strong> : <br/>';
						$this->dataMap .= '<div style="clear:both">&nbsp;</div>';
						$this->makenice($value);
						$this->dataMap .= $this->mapElement;
						$this->mapElement = '';
						$this->dataMap .= '</td>';
					}
					////
				}else{
						$this->dataMap .= '<td style="border:5px solid #006666; background-color:#036e6e;">';
						$this->dataMap .= 'Please make sure to evaluate data as Array()</td>';
				}
				
			$this->dataMap .= '  </tr>';
			$this->dataMap .= '</table>';			
			////
			
		$this->dataMap .= '</div>';
		$this->dataMap .= '<!-- END Data Map -->';
		
		return $this->dataMap;
		
	}// END dataMap
	
	
	
	///////////////////////////////////////////////////////////
	// START makeNiceExport
	function makeNiceExport($unknownVar){
	
		$this->unknownVar = $unknownVar;
			
		//$this->mapElement .= 'Results : <br/>';
		
		$this->checkedVar = $this->isValid($this->unknownVar);
	
		if($this->checkedVar == 1){
		
			if(is_array($this->unknownVar)){
				
				$totalRows = count($this->unknownVar);
				$i= 1;
				
				foreach($this->unknownVar as $key => $value){
					
					if(is_array($value)){
					
						if(is_numeric($key)){
							$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0;">'.$key.' => array (&nbsp;';
						}else{
							$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0;">\''.$key.'\' => array (&nbsp;';
						}
						
						$this->makeNiceExport($value);
						// $this->mapElement .= ')</div>';
						
						if($i < $totalRows){
							$this->mapElement .= '),</div>';
						}else{
							$this->mapElement .= ')</div>';
						}
						
					}else{
						
						if(is_numeric($key)){
							$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0">'.$key;
						}else{
							$this->mapElement .= '<div style="margin-left:35px;clear:both;padding:3px 0">\''.$key.'\'';
						}
						
						if(is_numeric($value)){
							$this->mapElement .= ' => '.$value;
						}else{
							$this->mapElement .= ' => \''.$value.'\'';
						}
						
						if($i < $totalRows){
							$this->mapElement .= ',</div>';
						}else{
							$this->mapElement .= '</div>';						
						}

					}
					
					$i++;

				}
				
			
			}else{
				$this->varType = $this->findType($this->unknownVar);
				
				$this->tempMapElement = $this->unknownVar.' ('.$this->varType.')';
				
				$this->mapElement .= $this->divUp($this->tempMapElement);
								
			}
			
		}else{	// Variable is not Valid (empty, null, undefined etc ...)
			$this->mapElement .= $this->divUp($this->validity);
		}
		
		return $this->mapElement;
		
	}// END makeNiceExport

		
	
	///////////////////////////////////////////////////////////
	// START exportMap
	function exportMap($unknownVar){
		
		$this->dataMap .= '<!-- START Data Map -->';
		$this->dataMap .= '<div id="hidden" style="background-color:#006666;clear:both; width:336px; margin:10px 0 0 0;" onclick="javascript:showMakenice();">';
		$this->dataMap .= '<div style="margin:0 20px; padding:10px 0; color:ffffff;">Show Data Map +</div>';
		$this->dataMap .= '</div>';
		$this->dataMap .= '<div id="shown" style="background-color:#006666; clear:both; display:none; color:fff; float:left; padding:0px 5px 5px 5px; margin:10px 0 0 0;">';
		$this->dataMap .= '<div style="margin:0 20px; padding:10px 0 3px 0;" onclick="javascript:hideMakenice();">Hide Data Map -</div>';
				
			////
			$this->dataMap .= '<table border="0" cellspacing="0" cellpadding="0">';
			$this->dataMap .= ' <tr>';
			
				if(is_array($unknownVar)){
				
					////
					foreach($unknownVar as $key => $value){
						$this->dataMap .= '<td style="border:5px solid #006666; background-color:#036e6e;">';
						$this->dataMap .= 'Result for <strong>"'.$key.'"</strong> : <br/>';
						$this->dataMap .= '<div style="clear:both">&nbsp;</div>';
						$this->makeNiceExport($value);
						$this->dataMap .= $this->mapElement;
						$this->mapElement = '';
						$this->dataMap .= '</td>';
					}
					////
				}else{
						$this->dataMap .= '<td style="border:5px solid #006666; background-color:#036e6e;">';
						$this->dataMap .= 'Please make sure to evaluate data as Array()</td>';
				}
				
			$this->dataMap .= '  </tr>';
			$this->dataMap .= '</table>';			
			////
			
		$this->dataMap .= '</div>';
		$this->dataMap .= '<!-- END Data Map -->';
		
		return $this->dataMap;
		
	}// END exportMap
	
	
	
	///////////////////////////////////////////////////////////
	// START showDebug
	function showDebug($unknownVar){
		
		$this->displayDebug = debug($unknownVar, $showHTML = true, $showFrom = true);
		
		return $this->displayDebug;
		
	}// END showDebug

}

?>