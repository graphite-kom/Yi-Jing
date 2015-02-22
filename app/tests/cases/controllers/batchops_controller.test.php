<?php
/* Batchops Test cases generated on: 2010-12-22 07:12:32 : 1293004592*/
App::import('Controller', 'Batchops');

class TestBatchopsController extends BatchopsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BatchopsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.batchop', 'app.batchval');

	function startTest() {
		$this->Batchops =& new TestBatchopsController();
		$this->Batchops->constructClasses();
	}

	function endTest() {
		unset($this->Batchops);
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