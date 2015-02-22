<?php
/* Refhexagram Fixture generated on: 2010-12-06 06:12:57 : 1291617357 */
class RefhexagramFixture extends CakeTestFixture {
	var $name = 'Refhexagram';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'supTrigram' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'infTrigram' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'element' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'self' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'other' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'level1branch' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'level4branch' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'supTrigram' => 1,
			'infTrigram' => 1,
			'element' => 'Lorem ipsum dolor sit amet',
			'self' => 1,
			'other' => 1,
			'level1branch' => 'Lorem ipsum dolor sit amet',
			'level4branch' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>