<?php


class PreparesavingComponent extends Object{
	
	
	
	////////////////////////////////////////////////////////////
	/// START cleanUpHexagramArray
	function cleanUpHexagramArray($hexagram, $parent_id = 0) {
		
		/// Main Hexagram 
		unset($hexagram['RefHexagram']);
		unset($hexagram['Hexagram']['question']);
		unset($hexagram['Hexagram']['mausBranches']);
		/// 
		/// Mutated Hexagram 
			/// Mutated Hexagram 
		if (!empty($parent_id)) {
			$hexagram['Hexagram']['parent_id'] = $parent_id;
		}
		
		return $hexagram;
		
	}/// END cleanUpHexagramArray
	
	
	
	////////////////////////////////////////////////////////////
	/// START cleanUpHexagram
	function cleanUpHexagram($hexagram, $parent_id = 0) {
		
		$hexagram = $this->cleanUpHexagramArray($hexagram, $parent_id);
		
		return $hexagram;
		
	}/// END cleanUpHexagram
	
	
	
	////////////////////////////////////////////////////////////
	/// START cleanUpTraits
	function cleanUpTraits($hexagram, $hexagram_id) {
		
		$i = 6;
		
		foreach($hexagram['Trait'] as $level){
			
			$hexagram['Trait'][$i]['hexagram_id'] = $hexagram_id;
			
			$i--;
			
		}
		
		return $hexagram;
		
	}/// END cleanUpTraits
		
	
	////////////////////////////////////////////////////////////
	/// START cleanUpRelationships
	function cleanUpRelationships($hexagram, $hexagram_id) {

	
		$newRealationshipArray = array();		
		
		$i = 0;
		
		foreach($hexagram['Relationship'] as $level){
			
			$hexagram['Relationship'][$i]['hexagram_id'] =  $hexagram_id;

			$i++;
			
		}
		
	
		return $hexagram;
		
	}/// END cleanUpRelationships
	
	
	
	
}


?>