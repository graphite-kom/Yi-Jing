<?php
/* Menucat Test cases generated on: 2010-12-01 18:12:37 : 1291229737*/
App::import('Model', 'Menuleft.Menucat');

class MenucatTestCase extends CakeTestCase {
	var $fixtures = array('plugin.menuleft.menucat');

	function startTest() {
		$this->Menucat =& ClassRegistry::init('Menucat');
	}

	function endTest() {
		unset($this->Menucat);
		ClassRegistry::flush();
	}

}
?>