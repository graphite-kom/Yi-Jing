<?php
/* Loop Test cases generated on: 2010-11-25 00:11:15 : 1290643335*/
App::import('Model', 'Loop');

class LoopTestCase extends CakeTestCase {
	var $fixtures = array('app.loop');

	function startTest() {
		$this->Loop =& ClassRegistry::init('Loop');
	}

	function endTest() {
		unset($this->Loop);
		ClassRegistry::flush();
	}

}
?>