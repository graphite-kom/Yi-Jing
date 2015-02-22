<?php
class BatchopsController extends AppController {

	var $name = 'Batchops';

	function index() {
		$this->Batchop->recursive = 0;
		$this->set('batchops', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid batchop', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('batchop', $this->Batchop->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Batchop->create();
			if ($this->Batchop->save($this->data)) {
				$this->Session->setFlash(__('The batchop has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batchop could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid batchop', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Batchop->save($this->data)) {
				$this->Session->setFlash(__('The batchop has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batchop could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Batchop->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for batchop', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Batchop->delete($id)) {
			$this->Session->setFlash(__('Batchop deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Batchop was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>