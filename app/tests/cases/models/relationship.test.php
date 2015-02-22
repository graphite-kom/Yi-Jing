<?php
/* Relationship Test cases generated on: 2010-12-15 18:12:19 : 1292438839*/
App::import('Model', 'Relationship');

class RelationshipTestCase extends CakeTestCase {
	var $fixtures = array('app.relationship', 'app.hexagram', 'app.question', 'app.refhexagram', 'app.trait');

	function startTest() {
		$this->Relationship =& ClassRegistry::init('Relationship');
	}

	function endTest() {
		unset($this->Relationship);
		ClassRegistry::flush();
	}

}
?>