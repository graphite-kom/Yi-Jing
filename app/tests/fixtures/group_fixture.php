<?php
/* Group Fixture generated on: 2010-12-22 06:12:13 : 1293000373 */
class GroupFixture extends CakeTestFixture {
	var $name = 'Group';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'groupName' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'questionTemplate' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 360, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'parent_id' => 1,
			'groupName' => 'Lorem ipsum dolor sit amet',
			'questionTemplate' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-12-22 06:46:13'
		),
	);
}
?>