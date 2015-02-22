<?php
class Batchval extends AppModel {
	var $name = 'Batchval';
	var $displayField = 'id';
	var $validate = array(
		'batchop_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Batchop' => array(
			'className' => 'Batchop',
			'foreignKey' => 'batchop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>