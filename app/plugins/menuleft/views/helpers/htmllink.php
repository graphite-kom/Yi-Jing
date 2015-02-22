<?php

class HtmllinkHelper extends AppHelper{

	function makeLink($linkparam){
		
		if(Set::check($linkparam)){
			
			$this->madeLink = '<li><a href="'.$linkparam['controller'].'/';
			
			if($linkparam['action'] == 'index'){
			
			}else{
				$this->madeLink .= $linkparam['action'].'/';
			}
			
			$this->madeLink .= $linkparam['idparam'].'">'.$linkparam['title'].'</a></li>';
			
			return $this->madeLink;
			
		}
	
	}
}

?>