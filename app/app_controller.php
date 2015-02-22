<?php

class AppController extends Controller {
	
	/*
		Make sure to include 'Session', 'Html', 'Form' in the array() :
			When using AppController to list Helpers, the default settings 
			are over-ridden, so default helpers are no longer automatically loaded
	*/
	var $helpers = array('Js' => array('Jquery'),'Session', 'Html', 'Form', 'Makenice','Dateselect', 'FormValidation'); 
	
}


?>