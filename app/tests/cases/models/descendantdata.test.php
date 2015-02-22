<?php
/* Descendantdata Test cases generated on: 2011-01-21 18:01:24 : 1295633664*/
App::import('Model', 'Descendantdata');

class DescendantdataTestCase extends CakeTestCase {
	var $fixtures = array('app.descendantdata', 'app.mockdata');

	function startTest() {
		$this->Descendantdata =& ClassRegistry::init('Descendantdata');
	}

	function endTest() {
		unset($this->Descendantdata);
		ClassRegistry::flush();
	}

}
?>