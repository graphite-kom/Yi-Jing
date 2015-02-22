<?php
class XmlHtmlRequestController extends AppController {

	var $uses = array();
	
	var $components = array('RequestHandler');
	
	function getTableFieldNames($model) {
	
			// set model for cakePHP
			$this->loadModel($model);
			
			// generate the table name from the model's name
			$tableName = strtolower($model).'s';
			
			// query for columns in this table
			$dbResults = $this->$model->query("SHOW COLUMNS FROM $tableName;");
			
			// store the list of columns in an 
			// array and stipping out the id column
			$i = 1;
			
			if (!empty($dbResults)) {
				foreach($dbResults as $resultSets => $columnName){
					if ($columnName['COLUMNS']['Field'] != 'id') {
						$output[$i] = $columnName['COLUMNS']['Field'];
						$i++;
					}
				}
			}
			
			return $output;
			
	}
	
	function stripRadios($data) {

		// START Strip radio fields
		$dataArray = $data;
		foreach($dataArray as $fieldElement){
			if ($fieldElement['type'] == 'radio') {
				
				$i = 0;
				$radios = Array();
				foreach($dataArray as $radioElement){
					if ($radioElement['name'] == $fieldElement['name']) {
						$radios[] = $i;
					}
					$i++;
				}
				
				foreach ($radios as $radioSetElementIndex => $radioSetElement){
					if ($radioSetElementIndex < (count($radios)-1)) {
						unset($dataArray[$radioSetElement]);
					}
					
				}
				
			}
			
		}// END Strip radio fields
		
		return $dataArray;
		
	}
	
	function getResponsePosition($model) {
		
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
		
		
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		Get the table columns
		////////////////////////////////////////////////////////////////////////////////////////////

		Configure::write('debug', 3);
		
		// check to make sure that the script 
		// requesting the info is indeed ajax
		// using RequestHandlerComponent
		if ($this->RequestHandler->isAjax()){
			
			// getTableFieldNames
			$tableFieldNames = $this->getTableFieldNames($model);
			
			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		Get the field attribute type, name and id
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
		// 		Compare both and come up with definitive array of DOM elements to 
		// 		which we will assign an Html response on the page's form via javascript
		////////////////////////////////////////////////////////////////////////////////////////////
		// 
		// 
			/////////////////////////////////////////////////////////////////////////
			if (!empty($this->data)) {
				$formDomElements = $this->stripRadios($this->data);
			}

			
		////////////////////////////////////////////////////////////////////////////////////////////
		// 		Output and end 
		////////////////////////////////////////////////////////////////////////////////////////////

			$output = debug($formDomElements, true, false).'<hr/>'.debug($tableFieldNames, true, false).'<hr/>'.debug($this->data, true, false);
			
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
		
	}
	
}
?>