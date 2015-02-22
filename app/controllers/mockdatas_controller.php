<?php
class MockdatasController extends AppController {

	var $name = 'Mockdatas';

	var $layout = 'yijing';
	
	var $components = array('RequestHandler');

	function beforeRender() {
		;
	}
	
	function index() {
		$this->Mockdata->recursive = 0;
		$this->set('mockdatas', $this->paginate());
	}

	function response() {
		
		/*		
		$this->layout = 'flash_data_layout';
		$resultVar = $this->data;
		$this->set(compact('resultVar'));
		*/
				
		//////////////////////////////////////////////////////
		// Set debug level to 1 or above
		// to override cake config 
		// in case it has it a set to 0
		
		Configure::write('debug', 1);
		
		// initialize $response
		$responseArray = array();
		
		// check to make sure that the script 
		// requesting the info is indeed ajax
		// using RequestHandlerComponent
		if ($this->RequestHandler->isAjax()){
			
			//////////////////////////////////////////////////////
			// Do validation
			// 1 - Set data to model like this :
			// $this->ModelName->set($this->data);
			
			$this->Mockdata->set($this->data);
			
			// 2 - run validation
			// method : $this->ModelName->validates()
			if ($this->Mockdata->validates()) {
				
				// run action if valid
				
			}else{
				
				// $errors = $this->ModelName->invalidFields(); 
				// contains validationErrors array
				
				$errors = $this->Mockdata->invalidFields();
				
				// place error in response array
				$responseArray[] = $errors;
				
			}
			
			$this->Mockdata->Descendantdata->set($this->data['Descendantdata'][0]);
			
			// 2 - run validation
			// method : $this->ModelName->validates()
			if ($this->Mockdata->Descendantdata->validates()) {
				
				// run action if valid
				
			}else{
				
				// $errors = $this->ModelName->invalidFields(); 
				// contains validationErrors array
				
				$errors = $this->Mockdata->Descendantdata->invalidFields();
				
				// place error in response array
				$responseArray[] = $errors;
				
			}
			
			//////////////////////////////////////////////////////
			// how to use debug() function
			// $response = debug($var, $showHTML, $showFrom)
			
			$responseArray[] = $this->data;
			$output = debug($responseArray, true, false);
			
			// Output to view Ajax
			echo $output;
		
		}
		
		//////////////////////////////////////////////////////
		// Do not output to view file
		$this->autoRender = false;
		// End script
		exit();		
		
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mockdata', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mockdata', $this->Mockdata->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Mockdata->create();
			if ($this->Mockdata->save($this->data)) {
				$this->Session->setFlash(__('The mockdata has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mockdata could not be saved. Please, try again.', true));
			}
		}
		
		$pageParam = $this->params;
		
		$this->set(compact('pageParam'));
		
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mockdata', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Mockdata->save($this->data)) {
				$this->Session->setFlash(__('The mockdata has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mockdata could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Mockdata->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mockdata', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Mockdata->delete($id)) {
			$this->Session->setFlash(__('Mockdata deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mockdata was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>