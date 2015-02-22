<?php
class QuestionsController extends AppController {

	var $name = 'Questions';
	
	var $layout = 'yijing';

	function index() {

		$this->Question->recursive = 1;
		$this->set('questions', $this->paginate());
	}

	function view($id = null) {

		if (!$id) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$question = $this->Question->find('first', array('contain' => 'Hexagram.parent_id = 0', 'conditions' => array('id' => $id)));
		
		$this->set(compact('question'));
		
	}
	
	/* Original view action	
	function view($id = null) {

		if (!$id) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}
	*/
	
	function add() {
		
		// $this->layout = 'addQuestion';
		
		if (!empty($this->data)) {
			$this->Question->create();
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The question has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		
		$groups = $this->Question->Group->find('list', array('fields' => array('Group.id','Group.groupName')));
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		
		// $this->layout = 'addQuestion';

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The question has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
	}

	function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Question was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>