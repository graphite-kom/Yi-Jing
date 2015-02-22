<?php
/* Menulink Fixture generated on: 2010-12-01 17:12:15 : 1291226115 */
class MenulinkFixture extends CakeTestFixture {
	var $name = 'Menulink';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'menucat_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'controller' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'action' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'idparam' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'optionsarray' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_menulinks_menucats1' => array('column' => 'menucat_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'menucat_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'idparam' => 1,
			'optionsarray' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>