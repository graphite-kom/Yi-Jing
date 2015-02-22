<?php
/* Comment Test cases generated on: 2010-12-21 15:12:14 : 1292945294*/
App::import('Model', 'Comment');

class CommentTestCase extends CakeTestCase {
	var $fixtures = array('app.comment', 'app.hexagram', 'app.question', 'app.refhexagram', 'app.relationship', 'app.trait');

	function startTest() {
		$this->Comment =& ClassRegistry::init('Comment');
	}

	function endTest() {
		unset($this->Comment);
		ClassRegistry::flush();
	}

}
?>