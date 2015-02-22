<?php
/* Batchval Test cases generated on: 2010-12-22 07:12:50 : 1293004670*/
App::import('Model', 'Batchval');

class BatchvalTestCase extends CakeTestCase {
	var $fixtures = array('app.batchval', 'app.batchop');

	function startTest() {
		$this->Batchval =& ClassRegistry::init('Batchval');
	}

	function endTest() {
		unset($this->Batchval);
		ClassRegistry::flush();
	}

}
?>