<?php
class ThingsController extends AppController {

	var $uses = array();
	
	function index() {
		
		$hulahoop = 'Aloha from controller !';
		
		$this->set('hulahoop', $hulahoop);
		
		/*$this->Tronc->recursive = 0;
		$this->set('troncs', $this->paginate());*/
	}
	
	/*
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tronc', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tronc', $this->Tronc->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tronc->create();
			if ($this->Tronc->save($this->data)) {
				$this->Session->setFlash(__('The tronc has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tronc could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tronc', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tronc->save($this->data)) {
				$this->Session->setFlash(__('The tronc has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tronc could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tronc->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tronc', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tronc->delete($id)) {
			$this->Session->setFlash(__('Tronc deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tronc was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
	
}
?>