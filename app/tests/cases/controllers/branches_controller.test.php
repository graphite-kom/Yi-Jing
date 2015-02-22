<?php
/* Branches Test cases generated on: 2010-12-01 16:12:04 : 1291219924*/
App::import('Controller', 'Branches');

class TestBranchesController extends BranchesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BranchesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.branch');

	function startTest() {
		$this->Branches =& new TestBranchesController();
		$this->Branches->constructClasses();
	}

	function endTest() {
		unset($this->Branches);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>