<?php
foreach($allCats as $allcat){
	echo '<h3>'.$allcat['Menucat']['menucatField'].' :</h3>';
	echo '<ul>';
	
	foreach($allcat['Menulink'] as $menulink){
		if($renderedLink = $htmllink->makeLink($menulink)){
			echo $renderedLink;
		}else{
			echo 'Sorry nothing loaded';
		}
		
	}
	echo '</ul>';
}


?>