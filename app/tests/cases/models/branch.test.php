<?php
/* Branch Test cases generated on: 2010-12-01 16:12:54 : 1291219734*/
App::import('Model', 'Branch');

class BranchTestCase extends CakeTestCase {
	var $fixtures = array('app.branch');

	function startTest() {
		$this->Branch =& ClassRegistry::init('Branch');
	}

	function endTest() {
		unset($this->Branch);
		ClassRegistry::flush();
	}

}
?>