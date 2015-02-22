<?php
/* Menucats Test cases generated on: 2010-12-02 03:12:47 : 1291260167*/
App::import('Controller', 'Menuleft.Menucats');

class TestMenucatsController extends MenucatsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MenucatsControllerTestCase extends CakeTestCase {
	var $fixtures = array('plugin.menuleft.menucat');

	function startTest() {
		$this->Menucats =& new TestMenucatsController();
		$this->Menucats->constructClasses();
	}

	function endTest() {
		unset($this->Menucats);
		ClassRegistry::flush();
	}

}
?>