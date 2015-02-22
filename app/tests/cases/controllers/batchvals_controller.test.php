<?php
/* Batchvals Test cases generated on: 2010-12-22 07:12:11 : 1293004691*/
App::import('Controller', 'Batchvals');

class TestBatchvalsController extends BatchvalsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BatchvalsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.batchval', 'app.batchop');

	function startTest() {
		$this->Batchvals =& new TestBatchvalsController();
		$this->Batchvals->constructClasses();
	}

	function endTest() {
		unset($this->Batchvals);
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