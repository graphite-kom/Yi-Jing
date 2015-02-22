<?php
class MenucatsController extends MenuleftAppController {

	var $name = 'Menucats';
		
	var $helpers = array('Menuleft.Htmllink', );

	function index() {
		$this->Menucat->recursive = 2;
		$this->set('menucats', $this->paginate());
	}

	function rendermenu() {
		
		// $menuData = array('menuItems' => $this->Menucat->find('all'), 'menuCount' => $this->Menucat->find('count'));
		/**/
		
		$allCats = $this->Menucat->find('all');
		$this->set('allCats', $allCats);
		
		$catCount = $this->Menucat->find('count');
		$this->set('catCount', $catCount);
		
		$this->set('paginatedResults', $this->paginate());
		
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid menucat', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menucat', $this->Menucat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Menucat->create();
			if ($this->Menucat->save($this->data)) {
				$this->Session->setFlash(__('The menucat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menucat could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid menucat', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Menucat->save($this->data)) {
				$this->Session->setFlash(__('The menucat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menucat could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Menucat->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for menucat', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Menucat->delete($id)) {
			$this->Session->setFlash(__('Menucat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Menucat was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>