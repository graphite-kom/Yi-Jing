<?php
/* Question Fixture generated on: 2010-11-29 17:11:59 : 1291051199 */
class QuestionFixture extends CakeTestFixture {
	var $name = 'Question';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'questionField' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'efficaceUtilitaire' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'questionField' => 'Lorem ipsum dolor sit amet',
			'efficaceUtilitaire' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>