<?php
/* Group Test cases generated on: 2010-12-22 06:12:13 : 1293000373*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $fixtures = array('app.group', 'app.question', 'app.hexagram', 'app.refhexagram', 'app.comment', 'app.relationship', 'app.trait');

	function startTest() {
		$this->Group =& ClassRegistry::init('Group');
	}

	function endTest() {
		unset($this->Group);
		ClassRegistry::flush();
	}

}
?>