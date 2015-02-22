<?php
/* Groups Test cases generated on: 2010-12-22 06:12:02 : 1293000422*/
App::import('Controller', 'Groups');

class TestGroupsController extends GroupsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GroupsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.group', 'app.question', 'app.hexagram', 'app.refhexagram', 'app.comment', 'app.relationship', 'app.trait');

	function startTest() {
		$this->Groups =& new TestGroupsController();
		$this->Groups->constructClasses();
	}

	function endTest() {
		unset($this->Groups);
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