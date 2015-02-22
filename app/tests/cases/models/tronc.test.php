<?php
/* Tronc Test cases generated on: 2010-12-01 16:12:24 : 1291219704*/
App::import('Model', 'Tronc');

class TroncTestCase extends CakeTestCase {
	var $fixtures = array('app.tronc');

	function startTest() {
		$this->Tronc =& ClassRegistry::init('Tronc');
	}

	function endTest() {
		unset($this->Tronc);
		ClassRegistry::flush();
	}

}
?>