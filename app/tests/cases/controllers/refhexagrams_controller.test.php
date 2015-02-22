<?php
/* Refhexagrams Test cases generated on: 2010-12-06 06:12:39 : 1291617399*/
App::import('Controller', 'Refhexagrams');

class TestRefhexagramsController extends RefhexagramsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RefhexagramsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.refhexagram', 'app.hexagram', 'app.question', 'app.trait');

	function startTest() {
		$this->Refhexagrams =& new TestRefhexagramsController();
		$this->Refhexagrams->constructClasses();
	}

	function endTest() {
		unset($this->Refhexagrams);
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