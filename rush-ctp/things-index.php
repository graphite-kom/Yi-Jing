<div class="troncs index">
	<h2><?php __('Things that get included'); ?></h2>
	<?php 
	// A Static variable set in Controller (things_controller.php)
	echo $hulahoop;
	echo '<br/>';
	
	// An app import from app/vendor/ folder
	App::import('Vendor','example'); 
	echo '<br/>';
	
	// A request action from plugin
	$menuRequested = $this->requestAction('/menuleft/menucats/rendermenu', array('return'));
	echo $menuRequested;
	// echo '<div>'.$makenice->makenice($menuRequested).'</div>';
	
	?>
</div>

