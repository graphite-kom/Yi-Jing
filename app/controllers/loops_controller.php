<?php
class LoopsController extends AppController {

	var $name = 'Loops';

	function index() {
		$this->Loop->recursive = 0;
		$this->set('loops', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid loop', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('loop', $this->Loop->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Loop->create();
			if ($this->Loop->save($this->data)) {
				$this->Session->setFlash(__('The loop has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loop could not be saved. Please, try again.', true));
			}
		}
		$loops = $this->Loop->ParentLoop->find('list');
		$this->set(compact('loops'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid loop', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Loop->save($this->data)) {
				$this->Session->setFlash(__('The loop has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loop could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Loop->read(null, $id);
		}
		$loops = $this->Loop->ParentLoop->find('list');
		$this->set(compact('loops'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for loop', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Loop->delete($id)) {
			$this->Session->setFlash(__('Loop deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Loop was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>