<?php
/* Menucat Fixture generated on: 2010-12-01 17:12:10 : 1291225990 */
class MenucatFixture extends CakeTestFixture {
	var $name = 'Menucat';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'menucatField' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'menucatField' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>