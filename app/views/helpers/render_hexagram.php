<?php

class RenderHexagramHelper extends AppHelper{
	
	var $helpers = array('Html');
	
	///////////////////////////////////////////////////////////
	// START doImageAlt
	function doImageAlt($value){
		
			switch ($value){
			case 9:
				$imageAlt = 'Mutable Yang (9)';
				break;
				
			case 8:
				$imageAlt = 'Yin (8)';
				break;
				
			case 7:
				$imageAlt = 'Yang (7)';
				break;
			
			case 6:
				$imageAlt = 'Mutable Yin (6)';
				break;
			
		}
		
		return $imageAlt;
		
	}// END doImageAlt

	
	
	///////////////////////////////////////////////////////////
	// START doAnimalPicto
	function doAnimalPicto($value){
		
			switch ($value){
				case 'Green Dragon':
					$imageName = 'gd';
					$imageAlt = $value;
					break;
				
				case 'Red Bird':
					$imageName = 'rb';
					$imageAlt = $value;
					break;
				
				case 'Yellow Scorpion':
					$imageName = 'ys';
					$imageAlt = $value;
					break;
				
				case 'Gray Serpent':
					$imageName = 'gs';
					$imageAlt = $value;
					break;
				
				case 'White Tiger':
					$imageName = 'wt';
					$imageAlt = $value;
					break;
				
				case 'Black Turtle':
					$imageName = 'bt';
					$imageAlt = $value;
					break;
				
			
		}
		
		$animalPicto = array('imgName' => $imageName, 'imgAlt' => $imageAlt);
		
		return $animalPicto;
		
	}// END doAnimalPicto


	///////////////////////////////////////////////////////////
	// START doEffU
	function doEffU($value){
		
		if($value > 0){
			
		}
		
		return $selfPicto;
		
	}// END doEffU


	
	///////////////////////////////////////////////////////////
	// START getTraitHtml
	function getTraitHtml($traits){
		
		$traitHtml = '<table border="0" cellspacing="0" cellpadding="0" class="traitTable">';
		///////////////////////////////////////////
		/*$traitHtml .= '<tr>';
		$traitHtml .= '<th>Self</th>';
		$traitHtml .= '<th>Animal</th>';
		$traitHtml .= '<th>Value</th>';
		$traitHtml .= '<th>Branch</th>';
		$traitHtml .= '<th>Element</th>';
		$traitHtml .= '<th>Parenthood</th>';
		$traitHtml .= '<th>Eff U</th>';
		$traitHtml .= '<th>TN</th>';
		$traitHtml .= '<th>TNM</th>';
		$traitHtml .= '<th>TNA</th>';
		$traitHtml .= '<th>Maus</th>';
		$traitHtml .= '</tr>';*/
		///////////////////////////////////////////
		
		
		foreach($traits as $level){
			
			$traitHtml .= '<tr>';
			
			// Self Other picto
			$traitHtml .= '<td class="selfCell">';
			if($level['isSelf'] > 0){
				$traitHtml .= $this->Html->image('picto/self.png', array('alt' => 'Self', 'title' => 'Self'));
			}else if($level['isOther'] > 0){
				$traitHtml .= $this->Html->image('picto/other.png', array('alt' => 'Other', 'title' => 'Other'));
			}else{
				$traitHtml .= '&nbsp;';
			}
			$traitHtml .= '</td>';
			
			// Animal picto
			$animalPicto = $this->doAnimalPicto($level['animal']);
			$traitHtml .= '<td class="animalCell">'.$this->Html->image('picto/'.$animalPicto['imgName'].'.png', array('alt' => $animalPicto['imgAlt'], 'title' => $animalPicto['imgAlt'], 'align' => 'right')).'</td>';
			
			// Trait Image
			$traitImage = $level['traitValue'];
			$traitImageAlt = $this->doImageAlt($level['traitValue']);
			$traitHtml .= '<td class="traitCell">'.$this->Html->image('traits/'.$traitImage.'.png', array('alt' => $traitImageAlt, 'title' => $traitImageAlt)).'</td>';

			// traitAttribute
			$traitHtml .= '<td class="traitAttribute">'.$level['branche'].'</td>';
			$traitHtml .= '<td class="traitAttribute">'.$level['element'].'</td>';
			$traitHtml .= '<td class="traitAttribute">'.$level['parente'].'</td>';
			
			// Other pictos
			$traitHtml .= '<td class="otherPictos">';
				$pictoCellFull = 0;
				// isEffUtil
				if ($level['isEffUtil'] > 0) {
					$traitHtml .= $this->Html->image('picto/eu.png', array('alt' => 'Efficace Utilitaire', 'title' => 'Efficace Utilitaire'));
					$pictoCellFull = 1;
				}
				// TN 
				if ($level['trouNoirJour'] > 0) {
					$traitHtml .= $this->Html->image('picto/tn.png', array('alt' => 'TN', 'title' => 'TN'));
					$pictoCellFull = 1;
				}
				// TNM
				if ($level['trouNoirMois'] > 0) {
					$traitHtml .= $this->Html->image('picto/tnm.png', array('alt' => 'TNM', 'title' => 'TNM'));
					$pictoCellFull = 1;
				}
				// TNA
				if ($level['trouNoirAnnee'] > 0) {
					$traitHtml .= $this->Html->image('picto/tna.png', array('alt' => 'TNA', 'title' => 'TNA'));
					$pictoCellFull = 1;
				}
				// Maus
				if ($level['isMaus'] > 0) {
					$traitHtml .= $this->Html->image('picto/maus.png', array('alt' => 'Mausolee', 'title' => 'Mausolee'));
					$pictoCellFull = 1;
				}
				// $pictoCellFull = 0;
				if ($pictoCellFull == 0) {
					$traitHtml .= '&nbsp;';
				}
				
			$traitHtml .= '</td>';
						
			$traitHtml .= '</tr>';
			
		}
		
		$traitHtml .= '</table>';
		
		return $traitHtml;
		
		
		
	}// END getTraitHtml
	
	
	///////////////////////////////////////////////////////////
	// START renderHexagramHtml
	function renderHexagramHtml($mainTraitHtml, $mutatedTraitHtml = '', $hexagram){
		// $hexagramRender = '<div class="mainDiv"><div class="mainCell">';
		$hexagramRender = '<table border="0" cellspacing="0" cellpadding="0" class="traitMainTable">';
		/// START first row
		$hexagramRender .= '<tr>';
		$hexagramRender .= '<td class="hexToHexCell">Hexagram '.$hexagram['Hexagram']['refhexagram_id'].'</td><td class="hexToHexCell">&nbsp;</td>';
		
		if (!empty($mutatedTraitHtml)) {
			$hexagramRender .= '<td class="hexToHexCell">Hexagram '.$hexagram['ChildHexagram']['refhexagram_id'].'</td>';
		}else{
			$hexagramRender .= '<td class="hexToHexCell">&nbsp;</td>';
		}
		
		$hexagramRender .= '</tr>';
		/// END first row
		$hexagramRender .= '<tr>';
		$hexagramRender .= '<td class="hexagramCell">'.$mainTraitHtml.'</td>';
		$hexagramRender .= '<td class="hexagramCell">
		<div id="alternateContent">
			<a href="http://www.adobe.com/go/getflashplayer">
				<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
			</a>
		</div></td><td class="hexagramCell">';
		
		if (!empty($mutatedTraitHtml)) {
			$hexagramRender .= $mutatedTraitHtml;
		}else{
			$hexagramRender .= '&nbsp;';
		}
		
		$hexagramRender .= '</td></tr>';
		
		//////////////////////////////////////////////////
		/// START next row
		$hexagramRender .= '<tr>';
		
		if (!empty($mutatedTraitHtml)) {
			$hexagramRender .= '<td class="hexToHexCellLeft">'.$this->Html->image('picto/arrow-hexToHex.png', array('alt' => 'Hexagram to Hexagram Parenthood', 'title' => 'Hexagram to Hexagram Parenthood')).'<div>'.$hexagram['Hexagram']['element'].'</div></td>';
		}else{
			$hexagramRender .= '<td class="hexToHexCellLeft"><div>'.$hexagram['Hexagram']['element'].'</div></td>';
		}
		
		if (!empty($mutatedTraitHtml)) {
			$hexagramRender .= '<td class="hexToHexCell"><div>'.$hexagram['ChildHexagram']['hexToHexParenthood'].'</div></td>';
		}else{
			$hexagramRender .= '<td class="hexToHexCell">&nbsp;</td>';
		}
		
		
		if (!empty($mutatedTraitHtml)) {
			$hexagramRender .= '<td class="hexToHexCellRight">'.$this->Html->image('picto/arrow-hexToHex.png', array('alt' => 'Hexagram to Hexagram Parenthood', 'title' => 'Hexagram to Hexagram Parenthood')).'<div>'.$hexagram['ChildHexagram']['element'].'</div></td>';
		}else{
			$hexagramRender .= '<td class="hexToHexCellRight">&nbsp;</td>';
		}
		
				
		$hexagramRender .= '</tr>';
		
		// $this->Html->image('picto/self.png', array('alt' => 'Self', 'title' => 'Self'));
		/// END next row
		//////////////////////////////////////////////////

		$hexagramRender .= '</table>';
		
		return $hexagramRender;

		
	}// END renderHexagramHtml

	
	
	
	
	///////////////////////////////////////////////////////////
	// START doRenderHexagram
	// See if necessary
	/*
	function doRenderHexagram($hexagram){
		
		$mainTraitHtml = $this->getTraitHtml($hexagram['Trait']);
		
		if (!empty($hexagram['mutatedTraits'])) {
			$mutatedTraitHtml = $this->getTraitHtml($hexagram['mutatedTraits']);
			
			$hexagramRender = $this->renderHexagramHtml($mainTraitHtml, $mutatedTraitHtml, $hexagram);
		
		}else{
			$mutatedTraitHtml = '';
			$hexagramRender = $this->renderHexagramHtml($mainTraitHtml,$mutatedTraitHtml,$hexagram);
			
		}
				
		return $hexagramRender;

		
	}*/// END doRenderHexagram
	
	
		///////////////////////////////////////////////////////////
	// START doRenderHexagram
	function doRenderHexagram($hexagram){
		
		$mainTraitHtml = $this->getTraitHtml($hexagram['Trait']);
		
		if (!empty($hexagram['ChildHexagram']['Trait'])) {
			$mutatedTraitHtml = $this->getTraitHtml($hexagram['ChildHexagram']['Trait']);
			
			$hexagramRender = $this->renderHexagramHtml($mainTraitHtml, $mutatedTraitHtml, $hexagram);
		
		}else{
			$mutatedTraitHtml = '';
			$hexagramRender = $this->renderHexagramHtml($mainTraitHtml,$mutatedTraitHtml,$hexagram);
			
		}
				
		return $hexagramRender;

		
	}// END doRenderHexagram

	
}

?>