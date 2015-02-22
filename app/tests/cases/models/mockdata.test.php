<?php
/* Mockdata Test cases generated on: 2011-01-12 06:01:27 : 1294812207*/
App::import('Model', 'Mockdata');

class MockdataTestCase extends CakeTestCase {
	var $fixtures = array('app.mockdata');

	function startTest() {
		$this->Mockdata =& ClassRegistry::init('Mockdata');
	}

	function endTest() {
		unset($this->Mockdata);
		ClassRegistry::flush();
	}

}
?>