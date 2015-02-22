<?php
class RelationshipsController extends AppController {

	var $name = 'Relationships';
	
	var $components = array('setFlashData');
	
	var $layout = 'yijing';
	
	function index() {
		$this->Relationship->recursive = 0;
		$this->set('relationships', $this->paginate());
	}

	function traceFlashData($id = null) {
		
		// $this->layout = 'flash_data_layout';
		
		$this->layout = 'default';
		
		$relationships = $this->Relationship->find('all', array('conditions' => array('hexagram_id' => $id)));
		
		$preparedData = $this->setFlashData->doSetFlashData($relationships);
		
		$this->set(compact('relationships', 'preparedData'));
	}
	
	function flashData($id = null) {
		$this->layout = 'flash_data_layout';
		
		//$this->layout = 'default';
		
		$relationships = $this->Relationship->find('all', array('conditions' => array('hexagram_id' => $id)));
		
		if (!empty($relationships)) {
			$preparedData = $this->setFlashData->doSetFlashData($relationships);
		}else{
			$preparedData = 'relationshipData=|NOData';
		}
		
		
		$this->set(compact('relationships', 'preparedData'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid relationship', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('relationship', $this->Relationship->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Relationship->create();
			if ($this->Relationship->save($this->data)) {
				$this->Session->setFlash(__('The relationship has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.', true));
			}
		}
		$hexagrams = $this->Relationship->Hexagram->find('list');
		$this->set(compact('hexagrams'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid relationship', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Relationship->save($this->data)) {
				$this->Session->setFlash(__('The relationship has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Relationship->read(null, $id);
		}
		$hexagrams = $this->Relationship->Hexagram->find('list');
		$this->set(compact('hexagrams'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for relationship', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Relationship->delete($id)) {
			$this->Session->setFlash(__('Relationship deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Relationship was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>