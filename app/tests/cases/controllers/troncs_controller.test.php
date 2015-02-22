<?php
/* Troncs Test cases generated on: 2010-12-01 16:12:10 : 1291219810*/
App::import('Controller', 'Troncs');

class TestTroncsController extends TroncsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TroncsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.tronc');

	function startTest() {
		$this->Troncs =& new TestTroncsController();
		$this->Troncs->constructClasses();
	}

	function endTest() {
		unset($this->Troncs);
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