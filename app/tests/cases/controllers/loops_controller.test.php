<?php
/* Loops Test cases generated on: 2010-11-25 00:11:07 : 1290643387*/
App::import('Controller', 'Loops');

class TestLoopsController extends LoopsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LoopsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.loop');

	function startTest() {
		$this->Loops =& new TestLoopsController();
		$this->Loops->constructClasses();
	}

	function endTest() {
		unset($this->Loops);
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