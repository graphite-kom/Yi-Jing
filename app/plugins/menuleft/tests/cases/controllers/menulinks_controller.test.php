<?php
/* Menulinks Test cases generated on: 2010-12-02 00:12:50 : 1291248170*/
App::import('Controller', 'Menuleft.Menulinks');

class TestMenulinksController extends MenulinksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MenulinksControllerTestCase extends CakeTestCase {
	var $fixtures = array('plugin.menuleft.menulink');

	function startTest() {
		$this->Menulinks =& new TestMenulinksController();
		$this->Menulinks->constructClasses();
	}

	function endTest() {
		unset($this->Menulinks);
		ClassRegistry::flush();
	}

}
?>