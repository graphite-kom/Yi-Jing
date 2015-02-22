<?php
class Trait extends AppModel {
	var $name = 'Trait';
	
	var $validate = array(
		'hexagram_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				// 'message' => 'hexagram_id cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'traitValue' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Hexagram' => array(
			'className' => 'Hexagram',
			'foreignKey' => 'hexagram_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>