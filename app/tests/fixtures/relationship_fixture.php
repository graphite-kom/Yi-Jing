<?php
/* Relationship Fixture generated on: 2010-12-15 18:12:19 : 1292438839 */
class RelationshipFixture extends CakeTestFixture {
	var $name = 'Relationship';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'hexagram_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'firstTrait' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'secondTrait' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'relationshipType' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_relationships_hexagrams1' => array('column' => 'hexagram_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'hexagram_id' => 1,
			'firstTrait' => 1,
			'secondTrait' => 1,
			'relationshipType' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>