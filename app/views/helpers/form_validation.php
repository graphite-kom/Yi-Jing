<?php

	class FormValidationHelper extends AppHelper{
	
	var $helpers = array('Html','Js');
	
	var $scriptConfig = array(
		
		'baseURI' => null,
		// 'baseURI' => 'http://www.google.com',
		// 
		// base path to domain (http://www.example.com)
		//
		// if null, the script will attempt to find it dynamically
		//
		// -----
		'appBase' => null,
		// base path to application (example : 'myCakeFolder' will result in '/myCakeFolder/')
		//
		// if null, the script will attempt to find it dynamically
		//
		// if empty, the script will assume that this is the 
		// same as your base domain setting
		//
		// -----
		'JsPath' => 'general/formValidation',
		// base path to javascript init file (i.e. 'general/formValidation'
		// in the case where script is in webroot/js/general/formValidation.js)
		// 
		// if null, the script will look for formValidation.js
		// in webroot/js/
		// 
		// Please note that '*.js' extension is not required
		// so 'jquery-1.4.4.min.js' should then be 'jquery-1.4.4.min'
		//
		// if this Script is not in your webroot/js/ folder 
		// add '/' character at the beginning of  your path
		// ( '/myPersonalized/Javascript/Folder/formValidation' for
		// 'webroot/myPersonalized/Javascript/Folder/formValidation.js')
		//
		// -----
		'baseJQuery' => null,
		// base path to jQuery file (jquery-1.4.4.min)
		//
		// Please note that '*.js' extension is not required
		// so 'jquery-1.4.4.min.js' should then be 'jquery-1.4.4.min'
		//
		// 			or more presisely :
		//
		// 'jQuery/jquery-1.4.4.min' for 'webroot/js/jQuery/jquery-1.4.4.min'
		//
		// Please set to null if jQuery is already in 
		// your javascript library list in layout file.
		// 
		// If this library is not in your webroot/js/ folder 
		// add '/' character at the beginning of  your path
		// (webroot/myPersonalized/Javascript/Folder/jQuery/jquery-1.4.4.min.js)
		//
		// -----
		'otherJS' => array(),
		// 'otherJS' => array('jQuery/jQueryBubblePopup/Install/jquery.bubblepopup.v2.3.1.min.js'),
		// base path to javascript other files (i.e. 'general/formValidation'
		// in the case where script is in webroot/js/general/formValidation.js)
		//
		// List files in array format ('some_file', 'some_other_file', 'yet_another_file')
		//
		// Please note that '*.js' extension is not required
		// so 'jquery-1.4.4.min.js' should then be 'jquery-1.4.4.min'
		//
		// if this Script is not in your webroot/js/ folder 
		// add '/' character at the beginning of  your path
		// ( '/myPersonalized/Javascript/Folder/formValidation' for
		// 'webroot/myPersonalized/Javascript/Folder/formValidation.js')
		//
		// -----
		'baseIcons' => 'icons',
		// base path to icons folder (icons)
		//
		// If these images are in 'webroot/img/icons/'
		// just set value to 'icons'.
		//
		// Please set to null if icons are in your 
		// default image directory, i.e. webroot/img/
		//  
		// If these images are not in your webroot/img/ folder 
		// add '/' character at the beginning of  your path
		// (webroot/myPersonalized/Icons/Folder/icons/)
		// 
		// -----
		'baseCSS' => 'formValidation',
		// base path to formValidation.css file
		//
		// If this file is in 'webroot/css/formValidation.css'
		// just set value to 'formValidation'.
		//
		// Please set to null this file is in your 
		// default css directory, i.e. webroot/css/
		//  
		// If this file is not in your webroot/css/ folder 
		// add '/' character at the beginning of  your path
		// ('/myPersonalized/CSS/Folder/formValidation'
		// 'webroot/myPersonalized/CSS/Folder/formValidation.css')
		// -----
		'otherCSS' => array()
		// 'otherCSS' => array('/js/jQuery/jQueryBubblePopup/Install/jquery.bubblepopup.v2.3.1.css')
		// path to other .css files
		//
		// List files in array format ('some_file', 'some_other_file', 'yet_another_file')
		//
		// If files are in 'webroot/css/myCSS-File.css'
		// just set value to 'myCSS-File'.
		//  
		// If this file is not in your webroot/css/ folder 
		// add '/' character at the beginning of  your path
		// ('/myPersonalized/CSS/Folder/formValidation'
		// 'webroot/myPersonalized/CSS/Folder/myCSS-File.css')
		// -----
		
	
						// 'methodAllHtmlResponse' => 'before'
						// possible values : 'before' (before form tag), 'after' (after form tag)
						//
						// when method 'all' is chosen for form validation, the location 
						// on the page where you would like the output to show
						// 
						// cannot be null
						//
						// -----
						
	
	);
	
	///////////////////////////////////////////////////////////////////////////////////
	// START Scripts for bottom buffer
	///////////////////////////////////////////////////////////////////////////////////
	
		function setUpBottomBuffer($formsFromPage, $scriptParam){
			
			//////////////////////
			$params = '
				iconPath = "'.$scriptParam['baseURI'].$scriptParam['baseIcons'].'";
			';
			
			$this->Js->buffer($params);
			
			///////////////////////////////////////////////////////////////////////////////////
			/// START Dom Ready actions
			foreach($formsFromPage as $actionParameter){
				
				$onDomReadyAction = '
					formParameters = {submitButtonId : $("'.$actionParameter['submitButtonID'].'"), validateMethod : "'.$actionParameter['validateMethod'].'", displayMethod : "'.$actionParameter['displayMethod'][0].'", responseLocation : "'.$actionParameter['displayMethod'][1].'", iconPath : iconPath};
					loadFormElements(formParameters);
				';
				
				$this->Js->buffer($onDomReadyAction);

			}
			/// END Dom Ready actions
			///////////////////////////////////////////////////////////////////////////////////		

			
			///////////////////////////////////////////////////////////////////////////////////
			/// START event action
			// START Form submit action
			foreach($formsFromPage as $actionParameter){			
				
				$formAction = '
					event.preventDefault();
					formParameters = {submitButtonId : $("'.$actionParameter['submitButtonID'].'"), validateMethod : "'.$actionParameter['validateMethod'].'", displayMethod : "'.$actionParameter['displayMethod'][0].'", responseLocation : "'.$actionParameter['displayMethod'][1].'", iconPath : iconPath};
					formValidate(formParameters);
				';
				
				$this->Js->get($actionParameter['submitButtonID'])->event('click', $formAction);
				
			}// END  Form submit action		
			/// END event action
			///////////////////////////////////////////////////////////////////////////////////
			
		}

	///////////////////////////////////////////////////////////////////////////////////
	// START Set up form validation
	///////////////////////////////////////////////////////////////////////////////////
	
		/// START setUpFormValidation 
		function setUpFormValidation($formsFromPage){
			
			$scriptParam = Array();
			
			// baseURI
			if (!is_null($this->scriptConfig['baseURI'])) {
				$scriptParam['baseURI'] = $this->scriptConfig['baseURI'];
			}else{
				$scriptParam['baseURI'] =  FULL_BASE_URL;
			}
			
			// appBase
			if (!is_null($this->scriptConfig['appBase'])) {
				$scriptParam['appBase'] = '/'.$this->scriptConfig['appBase'].'/';
			}else{
				$scriptParam['appBase'] = Router::url('/');
			}
			
			
			// JsPath
			if (!is_null($this->scriptConfig['JsPath'])) {
				$this->Html->script($this->scriptConfig['JsPath'], array('inline' => false));
			}else{
				$this->Html->script('formToolKit', array('inline' => false));
			}
			
			// a jeter
			$this->Html->script('general/displayValidation', array('inline' => false));
			
			
			// baseJQuery
			if (!is_null($this->scriptConfig['baseJQuery'])) {
				$this->Html->script($this->scriptConfig['baseJQuery'], array('inline' => false));
			}
			
			// otherJS
			if (!empty($this->scriptConfig['otherJS'])) {
				foreach ($this->scriptConfig['otherJS'] as $JS_file){
					$this->Html->script($JS_file, array('inline' => false));
				}	
			}
			
			// baseIcons
			if (!is_null($this->scriptConfig['baseIcons'])) {
				$scriptParam['baseIcons'] = $this->Html->url('/img/'.$this->scriptConfig['baseIcons'].'/');
			}else{
				$scriptParam['baseIcons'] = $this->Html->url('/img/');
			}
				
			// baseCSS
			if (!is_null($this->scriptConfig['baseCSS'])) {
				$this->Html->css($this->scriptConfig['baseCSS'], 'stylesheet', array('inline' => false));	
			}
			
			// otherCSS
			if (!empty($this->scriptConfig['otherCSS'])) {
				foreach ($this->scriptConfig['otherCSS'] as $CSS_file){
					$this->Html->css($CSS_file, 'stylesheet', array('inline' => false));
				}	
			}
			
			
						// methodAllHtmlResponse
						//			if (!is_null($this->scriptConfig['methodAllHtmlResponse'])) {
						//				$scriptParam['methodAllHtmlResponse'] = $this->scriptConfig['methodAllHtmlResponse'];
						//			}else{
						//				$scriptParam['methodAllHtmlResponse'] = 'before';
						//			}

			// methodAllHtmlResponse
			$this->setUpBottomBuffer($formsFromPage, $scriptParam);

		}
		/// END setUpFormValidation
		
	///////////////////////////////////////////////////////////////////////////////////
	// END Set up form validation
	///////////////////////////////////////////////////////////////////////////////////
		
		
		
	}

?>
