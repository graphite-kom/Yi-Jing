<?php
/* Question Test cases generated on: 2010-11-29 17:11:59 : 1291051199*/
App::import('Model', 'Question');

class QuestionTestCase extends CakeTestCase {
	var $fixtures = array('app.question', 'app.hexagram', 'app.trait');

	function startTest() {
		$this->Question =& ClassRegistry::init('Question');
	}

	function endTest() {
		unset($this->Question);
		ClassRegistry::flush();
	}

}
?>