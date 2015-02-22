<?php
class RefhexagramsController extends AppController {

	var $name = 'Refhexagrams';
	
	var $trigramCells = array(
		0 => '<td>&nbsp;</td>',
		1 => '<td>---<br/>---<br/>---</td>',
		2 => '<td>- -<br/>- -<br/>- -</td>',
		3 => '<td>---<br/>- -<br/>---</td>',
		4 => '<td>- -<br/>---<br/>- -</td>',
		5 => '<td>- -<br/>---<br/>---</td>',
		6 => '<td>---<br/>---<br/>- -</td>',
		7 => '<td>- -<br/>- -<br/>---</td>',
		8 => '<td>---<br/>- -<br/>- -</td>'
	);
	
	function index() {
		$this->Refhexagram->recursive = 0;
		$this->set('refhexagrams', $this->paginate());
	}
	
	function maphexagrams() {
		
		$mappedHexagrams = array();
		
		for($i = 1; $i <= 8; $i++){
			$mappedHexagrams[$i] = $this->Refhexagram->find('all', array('conditions' => array('infTrigram' => $i), 'order' => array('Refhexagram.supTrigram DESC')));
		}
		
		$refhexagrams = $this->Refhexagram->find('all');
		
		// $questions = $this->Hexagram->Question->find('first', array('conditions' => array('Question.id' => $id))); //Get the questions data with this ID
		
		$trigramCells = $this->trigramCells;
		
		$this->set('refhexagrams', $this->paginate());
		$this->set(compact('refhexagrams','mappedHexagrams', 'trigramCells'));
	}
	
	
	/*
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid refhexagram', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('refhexagram', $this->Refhexagram->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Refhexagram->create();
			if ($this->Refhexagram->save($this->data)) {
				$this->Session->setFlash(__('The refhexagram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The refhexagram could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid refhexagram', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Refhexagram->save($this->data)) {
				$this->Session->setFlash(__('The refhexagram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The refhexagram could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Refhexagram->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for refhexagram', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Refhexagram->delete($id)) {
			$this->Session->setFlash(__('Refhexagram deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Refhexagram was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
?>