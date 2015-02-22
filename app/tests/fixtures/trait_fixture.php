<?php
/* Trait Fixture generated on: 2010-11-29 15:11:40 : 1291044640 */
class TraitFixture extends CakeTestFixture {
	var $name = 'Trait';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'traitValue' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'hexagram_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_traits_hexagrams' => array('column' => 'hexagram_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'traitValue' => 1,
			'hexagram_id' => 1
		),
	);
}
?>