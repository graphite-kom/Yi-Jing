<?php
/* Trait Test cases generated on: 2010-11-29 15:11:40 : 1291044640*/
App::import('Model', 'Trait');

class TraitTestCase extends CakeTestCase {
	var $fixtures = array('app.trait', 'app.hexagram');

	function startTest() {
		$this->Trait =& ClassRegistry::init('Trait');
	}

	function endTest() {
		unset($this->Trait);
		ClassRegistry::flush();
	}

}
?>