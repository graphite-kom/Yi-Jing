<?php
/* Batchval Fixture generated on: 2010-12-22 07:12:50 : 1293004670 */
class BatchvalFixture extends CakeTestFixture {
	var $name = 'Batchval';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'batchop_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'field1' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'field2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'field3' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'field4' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'field5' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_batch_values_batch_operations1' => array('column' => 'batchop_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'batchop_id' => 1,
			'field1' => 'Lorem ipsum dolor sit amet',
			'field2' => 'Lorem ipsum dolor sit amet',
			'field3' => 'Lorem ipsum dolor sit amet',
			'field4' => 'Lorem ipsum dolor sit amet',
			'field5' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>