<?php
class HexagramsController extends AppController {

	var $name = 'Hexagrams';
	
	var $components = array('Completearray', 'Preparesaving', 'ReadHexagrams', 'Analysis');
	
	var $helpers = array('RenderHexagram', 'RenderReverseHexagram'); 
	
	var $layout = 'yijing';

	
	function index() {
		
		$this->Hexagram->recursive = 2;
		
		$pageParams = $this->params;
		
		$this->set('pageParams', $pageParams);
		
		$this->set('hexagrams', $this->paginate());
		
	}

	function view($id = null) {
		
		// $this->layout = 'readHexagram';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid hexagram', true));
			$this->redirect(array('action' => 'index'));
		}
		
		// Query		
		$hexagram = $this->Hexagram->find(
			'first', 
			array(
				'recursive' => 2,
				'conditions' => array(
					'Hexagram.id' => $id
				), 
				'contain' => array(
					'Question',
					'Refhexagram',
					'ChildHexagram' => array(
						'Trait' => array(
							'order' => 'Trait.traitPosition DESC'
						)
					),
					'Relationship',
					'Trait' => array(
						'order' => 'Trait.traitPosition DESC'
					),
					'Comment' => array(
						'order' => 'Comment.created DESC'
					)
				)
			)
		);
		
		/////////////////////////////////////////////////////////////////////		
		// Tracing page data
		$pageData = $this->params;
		/////////////////////////////////////////////////////////////////////
		
		// sending over all data
		$this->set(compact('hexagram', 'pageData'));

	}
	
	
	///////////////////////////////////////////////////////////////////////
	///
	/// Sauvegarde de l'action "View
	///
	/* 
	function view($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid hexagram', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('hexagram', $this->Hexagram->read(null, $id));
	}
	*/
	///
	/// Sauvegarde de l'action "View
	///
	///////////////////////////////////////////////////////////////////////
	
	
	
	///////////////////////////////////////////////////////////////////////
	/// START Hexagram add
	///
	function add($id = null) {
		
		/// New add action
		if (!empty($this->data)) {
			
		/// Form data
		$this->Session->write('letsSeeAllThisData', $this->data);
		$checkedData = $this->Completearray->checkData($this->data);
		
		if (!$checkedData) {
			$this->Session->setFlash(__('Please complete fields thoroughly.', true));
			$this->redirect(array('action' => 'add', $id));
		}
			
		// Main Hexagram
			// calculate all info for main Hexagram
			$completedArray = $this->Completearray->doCompleteArray($this->data);
			
		// Mutated Hexagram
		
			// Evaluate if Hexagram needs to mutate
			$shouldMutate = $this->Completearray->needsToMutate($this->data);
			
			// Hexagram needs to mutate
			if ($shouldMutate) {
				
				// prepare data from parent Hexagram
				$parentHexagramElement = $completedArray['Hexagram']['element'];
				$parentMausBranches = $completedArray['Hexagram']['mausBranches'];	
				
				// calculate all info for mutated Hexagram		
				$mutatedArray = $this->Completearray->doCompleteArray($this->data, 'mutated', $parentHexagramElement, $parentMausBranches);
				$this->Session->write('mutatedArray', $mutatedArray);
				
			}else{

				$mutatedArray = '';
				
			}
			
			// Tracing
			$this->Session->write('mutatedArray', $mutatedArray);
			
			
		// Relationships
			
			// Hexagram needs to mutate
				
			$relationshipsArray = $this->Completearray->setrelationships->doSetrelationships($completedArray, $mutatedArray);

			
			$completedArray['Relationship'] = $relationshipsArray;
			
			// Tracing
			$this->Session->write('relationshipsArray', $completedArray['Relationship']);
			
		// Saving data
		
			$confirmation = array();
			
			// $mainHexagram
			$mainHexagram = $this->Preparesaving->cleanUpHexagram($completedArray);
			$this->Hexagram->create();
			
			if ($this->Hexagram->save($mainHexagram['Hexagram'])) {
				$confirmation['mainHexagram'] = 1;
				$mainHexagramId = $this->Hexagram->id;
			}else{
				$this->Session->write('failure', $mainHexagram);
			}
			
			// $mainTrait
			$mainHexagramTraits = $this->Preparesaving->cleanUpTraits($completedArray, $mainHexagramId);
			
			if ($this->Hexagram->Trait->saveAll($mainHexagramTraits['Trait'])) {
				$confirmation['mainTraits'] = 1;
			}
			
			;
			
			// $mutatedHexagram
			if ($shouldMutate) {
				$mutatedHexagram = $this->Preparesaving->cleanUpHexagram($mutatedArray, $mainHexagramId);
				$this->Hexagram->create();
				
				if ($this->Hexagram->save($mutatedHexagram['Hexagram'])) {
					$confirmation['mutatedHexagram'] = 1;
					$mutatedHexagramId = $this->Hexagram->id;
				}
				
			
			}
			
			// $mutatedTrait
			if ($shouldMutate) {
				$mutatedHexagramTraits = $this->Preparesaving->cleanUpTraits($mutatedArray, $mutatedHexagramId);
				
				if ($this->Hexagram->Trait->saveAll($mutatedHexagramTraits['Trait'])) {
					$confirmation['mutatedTraits'] = 1;
				}
				
			}
			
			// $relationships
				
			$relationshipsToSave = $this->Preparesaving->cleanUpRelationships($completedArray, $mainHexagramId);
			$this->Session->write('completedArray', $completedArray);
			$this->Session->write('mainHexagram', $relationshipsToSave['Relationship']);
			
			if ($this->Hexagram->Relationship->saveAll($relationshipsToSave['Relationship'])) {
				$confirmation['Relationship'] = 1;
			}
			
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/// START Analysis
			/// Extract newly saved data
			$hexagramToAnalyse = $this->Hexagram->find(
				'first', 
				array(
					'recursive' => 2,
					'conditions' => array(
						'Hexagram.id' => $mainHexagramId
					), 
					'contain' => array(
						'Question',
						'Refhexagram',
						'ChildHexagram' => array(
							'Trait' => array(
								'order' => 'Trait.traitPosition DESC'
							)
						),
						'Relationship',
						'Trait' => array(
							'order' => 'Trait.traitPosition DESC'
						),
						'Comment' => array(
							'order' => 'Comment.created DESC'
						)
					)
				)
			);
			/// Run analysis
			$hexagramAnalysis = $this->Analysis->doAnalysis($hexagramToAnalyse);
			/// Trace analysis
			$this->Session->write('analysis', $hexagramAnalysis);
			/// END Analysis
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			// Confirmation
				
			if ($shouldMutate) {
				$successValue = 5;
			}else{
				$successValue = 3;
			}
			
			$x = 0;
			
			foreach($confirmation as $valuesToAddUp){				
				$x++;				
			}
			
			if ($x == $successValue) {
				$confirmationMessage = 'The hexagram has been saved';
				// $this->redirect(array('action' => 'view', $mainHexagramId));
			}else{
				$confirmationMessage = 'The hexagram could not be saved. Please, try again.';
			}
				
			$this->Session->setFlash(__($confirmationMessage, true));
			

		}else{
			$letsSeeAllThisData = '';
			$refTrigramArray = '';
		}
		/* /// old add action
		if (!empty($this->data)) {
			$this->Hexagram->create();
			if ($this->Hexagram->save($this->data)) {
				$this->Session->setFlash(__('The hexagram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hexagram could not be saved. Please, try again.', true));
			}
		}*/
		
		
		/// Values for date select options
		$this->loadModel('Tronc');
		$troncs = $this->Tronc->find('all');
		$this->loadModel('Branche');
		$branches = $this->Branche->find('all');
		
		///////////////////////////////////////
		/// Tracing
		/// Find all the data about the question we rae adding a hexagram to
		$questions = $this->Hexagram->Question->find('first', array('conditions' => array('Question.id' => $id))); //Get the questions data with this ID
		/// Get all page passed parameters
		$pageParams = $this->params;
		
		///////////////////////////////////////
		/// Rendering
		/// Send all above data to view for rendering
		$this->set(compact('questions', 'troncs', 'branches','pageParams', 'letsSeeAllThisData','refhexagram','refTrigramArray'));
		
	}	/// END Hexagram add

	///////////////////////////////////////////////////////////////////////
	/// START Hexagram comment
	///
	function hexagramComment() {
		if (!empty($this->data)) {
			
			$hexagram_id = $this->data['Comment'][0]['hexagram_id'];
			
			$this->Hexagram->Comment->create();
			if ($this->Hexagram->Comment->saveAll($this->data['Comment'])) {
			// if ($this->data) {
				$this->Session->setFlash(__('The comment has been saved', true));
				$this->Session->write('pageData', $hexagram_id);
				$this->redirect(array('action' => 'view', $hexagram_id));
			} else {
				
				if (empty($this->data['Comment'][0]['comment'])) {
					$this->Session->setFlash(__('The comment could not be saved. Please fill out all fields thoroughly.', true));
				}else{
					$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
				}
				
				$this->redirect(array('action' => 'view', $hexagram_id));
				
			}
		}
		
	}/// END Hexagram comment
	
	function edit($id = null) {
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid hexagram', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Hexagram->save($this->data)) {
				$this->Session->setFlash(__('The hexagram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hexagram could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Hexagram->read(null, $id);
		}
		$questions = $this->Hexagram->Question->find('list');
		$this->set(compact('questions'));
	}

	function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for hexagram', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Hexagram->delete($id)) {
			$this->Session->setFlash(__('Hexagram deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Hexagram was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


}
?>