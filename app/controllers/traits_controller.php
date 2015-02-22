<?php
class TraitsController extends AppController {

	var $name = 'Traits';

	function index() {
		$this->Trait->recursive = 0;
		$this->set('traits', $this->paginate());
	}

	///////////////////////////////////////////////////////
	/// START readTraits for hexagram view
	function readTraits($id = null) {

		$traits = $this->Trait->find('all', array('order' => 'Trait.traitPosition DESC', 'conditions' => array('Trait.hexagram_id' => $id)));
		
		return $traits;
		
	}/// END readTraits for hexagram view
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid trait', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('trait', $this->Trait->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Trait->create();
			if ($this->Trait->save($this->data)) {
				$this->Session->setFlash(__('The trait has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trait could not be saved. Please, try again.', true));
			}
		}
		$hexagrams = $this->Trait->Hexagram->find('list');
		$this->set(compact('hexagrams'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid trait', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Trait->save($this->data)) {
				$this->Session->setFlash(__('The trait has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trait could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Trait->read(null, $id);
		}
		$hexagrams = $this->Trait->Hexagram->find('list');
		$this->set(compact('hexagrams'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for trait', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Trait->delete($id)) {
			$this->Session->setFlash(__('Trait deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trait was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>