<?php
/* Batchop Test cases generated on: 2010-12-22 07:12:04 : 1293004564*/
App::import('Model', 'Batchop');

class BatchopTestCase extends CakeTestCase {
	var $fixtures = array('app.batchop', 'app.batchval');

	function startTest() {
		$this->Batchop =& ClassRegistry::init('Batchop');
	}

	function endTest() {
		unset($this->Batchop);
		ClassRegistry::flush();
	}

}
?>