<?php
/* Hexagram Fixture generated on: 2010-12-15 18:12:25 : 1292438785 */
class HexagramFixture extends CakeTestFixture {
	var $name = 'Hexagram';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'refhexagram_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'efficaceUtilitaire' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'element' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'hexToHexParenthood' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'anneeTronc' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'anneeBranche' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'moisTronc' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'moisBranche' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'jourTronc' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'jourBranche' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_hexagrams_questions1' => array('column' => 'question_id', 'unique' => 0), 'fk_hexagrams_refHexagrams1' => array('column' => 'refhexagram_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'question_id' => 1,
			'refhexagram_id' => 1,
			'parent_id' => 1,
			'efficaceUtilitaire' => 'Lorem ipsum dolor sit amet',
			'element' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-12-15 18:46:25',
			'hexToHexParenthood' => 'Lorem ipsum dolor sit amet',
			'anneeTronc' => 'Lorem ipsum dolor sit amet',
			'anneeBranche' => 'Lorem ipsum dolor sit amet',
			'moisTronc' => 'Lorem ipsum dolor sit amet',
			'moisBranche' => 'Lorem ipsum dolor sit amet',
			'jourTronc' => 'Lorem ipsum dolor sit amet',
			'jourBranche' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>