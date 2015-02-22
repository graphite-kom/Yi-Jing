<?php
/* Refhexagram Test cases generated on: 2010-12-06 06:12:57 : 1291617357*/
App::import('Model', 'Refhexagram');

class RefhexagramTestCase extends CakeTestCase {
	var $fixtures = array('app.refhexagram', 'app.hexagram', 'app.question', 'app.trait');

	function startTest() {
		$this->Refhexagram =& ClassRegistry::init('Refhexagram');
	}

	function endTest() {
		unset($this->Refhexagram);
		ClassRegistry::flush();
	}

}
?>