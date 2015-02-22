<?php
class Loop extends AppModel {
	var $name = 'Loop';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasOne = array(
		'ChildLoop' => array(
			'className' => 'Loop',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $belongsTo = array(
		'ParentLoop' => array(
			'className' => 'Loop',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>