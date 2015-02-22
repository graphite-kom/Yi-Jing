<?php
/* Menulink Test cases generated on: 2010-12-02 00:12:47 : 1291248107*/
App::import('Model', 'Menuleft.Menulink');

class MenulinkTestCase extends CakeTestCase {
	var $fixtures = array('plugin.menuleft.menulink');

	function startTest() {
		$this->Menulink =& ClassRegistry::init('Menulink');
	}

	function endTest() {
		unset($this->Menulink);
		ClassRegistry::flush();
	}

}
?>