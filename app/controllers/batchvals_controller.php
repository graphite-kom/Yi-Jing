<?php
class BatchvalsController extends AppController {

	var $name = 'Batchvals';

	function index() {
		$this->Batchval->recursive = 0;
		$this->set('batchvals', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid batchval', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('batchval', $this->Batchval->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Batchval->create();
			if ($this->Batchval->save($this->data)) {
				$this->Session->setFlash(__('The batchval has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batchval could not be saved. Please, try again.', true));
			}
		}
		$batchops = $this->Batchval->Batchop->find('list');
		$this->set(compact('batchops'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid batchval', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Batchval->save($this->data)) {
				$this->Session->setFlash(__('The batchval has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batchval could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Batchval->read(null, $id);
		}
		$batchops = $this->Batchval->Batchop->find('list');
		$this->set(compact('batchops'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for batchval', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Batchval->delete($id)) {
			$this->Session->setFlash(__('Batchval deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Batchval was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>