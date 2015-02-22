<?php
/* Questions Test cases generated on: 2010-11-29 17:11:43 : 1291051603*/
App::import('Controller', 'Questions');

class TestQuestionsController extends QuestionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class QuestionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.question', 'app.hexagram', 'app.trait');

	function startTest() {
		$this->Questions =& new TestQuestionsController();
		$this->Questions->constructClasses();
	}

	function endTest() {
		unset($this->Questions);
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