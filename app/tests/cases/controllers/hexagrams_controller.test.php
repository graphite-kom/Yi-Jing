<?php
/* Hexagrams Test cases generated on: 2010-12-01 15:12:32 : 1291216772*/
App::import('Controller', 'Hexagrams');

class TestHexagramsController extends HexagramsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class HexagramsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.hexagram', 'app.question', 'app.trait');

	function startTest() {
		$this->Hexagrams =& new TestHexagramsController();
		$this->Hexagrams->constructClasses();
	}

	function endTest() {
		unset($this->Hexagrams);
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