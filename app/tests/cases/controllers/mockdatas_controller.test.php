<?php
/* Mockdatas Test cases generated on: 2011-01-12 06:01:59 : 1294812239*/
App::import('Controller', 'Mockdatas');

class TestMockdatasController extends MockdatasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MockdatasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.mockdata');

	function startTest() {
		$this->Mockdatas =& new TestMockdatasController();
		$this->Mockdatas->constructClasses();
	}

	function endTest() {
		unset($this->Mockdatas);
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