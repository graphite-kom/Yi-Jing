<?php
/* Relationships Test cases generated on: 2010-12-17 09:12:30 : 1292578830*/
App::import('Controller', 'Relationships');

class TestRelationshipsController extends RelationshipsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RelationshipsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.relationship', 'app.hexagram', 'app.question', 'app.refhexagram', 'app.trait');

	function startTest() {
		$this->Relationships =& new TestRelationshipsController();
		$this->Relationships->constructClasses();
	}

	function endTest() {
		unset($this->Relationships);
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