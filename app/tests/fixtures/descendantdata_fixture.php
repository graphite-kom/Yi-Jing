<?php
/* Descendantdata Fixture generated on: 2011-01-21 18:01:24 : 1295633664 */
class DescendantdataFixture extends CakeTestFixture {
	var $name = 'Descendantdata';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'mockdata_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'descendantdata1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'descendantdata2' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'descendantdata3' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'descendantdata4' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'comment' => '		', 'charset' => 'latin1'),
		'descendantdata5' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'descendantdata6' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'descendantdata7' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_descendantdatas_mockdatas1' => array('column' => 'mockdata_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'mockdata_id' => 1,
			'descendantdata1' => 'Lorem ipsum dolor sit amet',
			'descendantdata2' => 'Lorem ipsum dolor sit amet',
			'descendantdata3' => 'Lorem ipsum dolor sit amet',
			'descendantdata4' => 'Lorem ipsum dolor sit amet',
			'descendantdata5' => 'Lorem ipsum dolor sit amet',
			'descendantdata6' => 'Lorem ipsum dolor sit amet',
			'descendantdata7' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>