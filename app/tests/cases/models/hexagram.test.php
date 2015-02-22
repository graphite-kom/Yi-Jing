<?php
/* Hexagram Test cases generated on: 2010-12-15 18:12:28 : 1292438788*/
App::import('Model', 'Hexagram');

class HexagramTestCase extends CakeTestCase {
	var $fixtures = array('app.hexagram', 'app.question', 'app.refhexagram', 'app.relationship', 'app.trait');

	function startTest() {
		$this->Hexagram =& ClassRegistry::init('Hexagram');
	}

	function endTest() {
		unset($this->Hexagram);
		ClassRegistry::flush();
	}

}
?>