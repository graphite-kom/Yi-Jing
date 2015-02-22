<?php
class XmlHtmlRequestController extends AppController {

	var $uses = array();
	
	var $components = array('RequestHandler');
		
	////////////////////////////////////////////////////////////////////////////////////////////
	// START cleanUpData
	function cleanUpData($data) {
		
		$this->cleanData = Array();
		
		for ($i = 0; $i < count($data); $i++) {
			if ($data[$i]['type'] == 'hidden' || $data[$i]['type'] == 'submit' || $data[$i]['type'] == 'reset' || $data[$i]['type'] == 'button') {
			
			} else {
				if ($data[$i]['type'] == 'radio') {
					if ($data[$i]['checked'] == 1) {
						$this->cleanData[] = $data[$i];
					}
				} else {
					$this->cleanData[] = $data[$i];
				}			
				
			}
		}
		
		return $this->cleanData;
		
	}// END cleanUpData
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// START buildEvaluationArray
	function buildEvaluationArray($cleanData){
		
		$this->evaluationArray = Array();
		
		for ($i = 0; $i < count($cleanData); $i++) {
			
			$this->tmpNameProperty = str_replace(']', '', $cleanData[$i]['name']);
			$this->tmpNameProperty = explode('[', $this->tmpNameProperty);
	
			$cleanData[$i]['model'] = $this->tmpNameProperty[1];
			$cleanData[$i]['field'] = $this->tmpNameProperty[count($this->tmpNameProperty)-1];
			if ($cleanData[$i]['type'] != 'checkbox') {
				$cleanData[$i]['evaluationValue'] = $cleanData[$i]['value'];
			} else {
				$cleanData[$i]['evaluationValue'] = $cleanData[$i]['checked'];
			}
			
			$this->evaluationArray[] = $cleanData[$i];	
			
		}
		
		return $this->evaluationArray;
		
	}// END buildEvaluationArray
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// START buildEvaluationArray
	function evaluateArray($evaluationArray){
		
		for ($i = 0; $i < count($evaluationArray); $i++) {
			
			$this->model = $evaluationArray[$i]['model'];
			$this->fieldName = $evaluationArray[$i]['field'];
			$this->value = $evaluationArray[$i]['evaluationValue'];
			
			// $evaluationArray[$i]['validation'] = $this->runVal($this->model, $this->fieldName, $this->value);
			
			
			$this->data = Array();
			$this->data[$this->model][$this->fieldName] = $this->value;
			
			// set model for cakePHP
			if ($this->loadModel($this->model)) {
				
				if($this->{$this->model}->set($this->data)){
					
					if ($this->{$this->model}->validates(array('fieldlist' => array($this->fieldName)))) {
						$evaluationArray[$i]['validationStatus'] = 'Ok';
						$evaluationArray[$i]['validationMessage'] = 'Ok'; 
					} else {
						$this->currentValidation = $this->{$this->model}->invalidFields();
						
						if (empty($this->currentValidation[$this->fieldName])) {
							$evaluationArray[$i]['validationStatus'] = 'Ok';
							$evaluationArray[$i]['validationMessage'] = 'Ok'; 
						}else{
							$evaluationArray[$i]['validationStatus'] = 'Error';
							$evaluationArray[$i]['validationMessage'] = $this->currentValidation[$this->fieldName];						
						}
						
					}
					
				}				
				
			}
			
			
			
		
		}
		
		return $evaluationArray;
		
		
	}

	////////////////////////////////////////////////////////////////////////////////////////////
	// START runOverride
	function runOverride($evaluationResultArray){
		
		for ($i = 0; $i < count($evaluationResultArray); $i++) {
			$this->finalResponseArray[] = $evaluationResultArray[$i];
			//.. run all warnings here
			//.. reset 	$evaluationResultArray[$i]['validationStatus'] = 'Warning';		
			//.. reset $evaluationResultArray[$i]['validationMessage'] = 'Warning message';
		}
		
		return $this->finalResponseArray;
		
	}// END runOverride
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// START getValidationResponse
	function getValidationResponse() {
		
		//////////////////////////////////////////////////////		
		// FORM VALIDATION // form DOM elements retriever
		//////////////////////////////////////////////////////
		// INTRODUCTION
		// ------------
		// The following retrieves the column name from database
		// retrives the field names and ids in the html form
		// compares both sets and matches them together to determin 
		// dynamically where the response will be issued on the page
		// 
		// This especially useful for field types like radio inputs
		// since cakePHP generates radios in sets of several elements 
		// of which none bear the same id as the table column name 
		// and which on the other hand share the same name attribute
		
		//////////////////////////////////////////////////////
		// Set debug level to 1 or above
		// to override cake config 
		// in case it has it a set to 0


		Configure::write('debug', 3);
		
		// check to make sure that the script 
		// requesting the info is indeed ajax
		// using RequestHandlerComponent
		if ($this->RequestHandler->isAjax()){		
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		Get the field attributes
		////////////////////////////////////////////////////////////////////////////////////////////
			
			/////////////////////////////////////////////////////////////////////////
			// please see :
			// https://trac.cakephp.org/ticket/6125
			// 		and
			// http://stackoverflow.com/questions/1766621/how-do-i-handle-json-data-sent-as-an-http-post-to-a-cakephp-app 
			/////////////////////////////////////////////////////////////////////////
			// check to see if the request contains json data
			if($this->RequestHandler->requestedWith('json')) {
				// check to see if json features are installed as php component on server
			    if(function_exists('json_decode')) {
			    	// get the file content in the php input, 
			    	// stip white spaces, encode in UTF-8 characters and 
			    	// decode json file into associative array (true)
			    	// setting json_decode to false will output a standard class object
			        $jsonData = json_decode(utf8_encode(trim(file_get_contents('php://input'))), true);
			    } else {
			        // some other method to parse out json, perhaps inverse of JavascriptHelper::object
			    }
				// check file content 
			    if(!is_null($jsonData) and $jsonData !== false) {
			        
			    	// set result this data
			    	$this->data = $jsonData;
			    	// 
		        
			    }
			}
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		clean up received data
		////////////////////////////////////////////////////////////////////////////////////////////
			
			$this->cleanData = $this->cleanUpData($this->data);

		////////////////////////////////////////////////////////////////////////////////////////////
		// 		build evaluation array
		////////////////////////////////////////////////////////////////////////////////////////////
			
			$this->evaluationArray = $this->buildEvaluationArray($this->cleanData);
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		evaluate array
		////////////////////////////////////////////////////////////////////////////////////////////
			
			$this->evaluation = $this->evaluateArray($this->evaluationArray);
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		run override
		////////////////////////////////////////////////////////////////////////////////////////////
			
			$this->finalResponse = $this->runOverride($this->evaluation);
			
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		Output and end 
		////////////////////////////////////////////////////////////////////////////////////////////
			
			// $output = json_encode($this->data);
			
			// $output = '<hr/>'.Debugger::exportVar($this->data, $recursion = 3).'<hr/>';
			
			// $output = '<hr/>'.debug($this->jsonResponseData, true, false).'<hr/>';
			
			$output = json_encode($this->finalResponse);
			
			echo $output;
		
		}
		/////////////////////////////////////////////////////////////////////////
		// please see :
		// http://marcgrabanski.com/articles/cakephp-ajax-quick-save-jquery
		// gives a detailed example
		//////////////////////////////////////////////////////
		// Do not output to view file
		$this->autoRender = false;
		// End script
		exit();		
		
	}// END getValidationResponse
	
}
?>