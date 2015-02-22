<div class="troncs index">
	
	<h2><?php __('Things that get included'); ?></h2>
	<?php 
	// A Static variable set in Controller (things_controller.php)
	echo $hulahoop.'<br/>';
	echo '<br/><em><span style="font-size:11px; font-weight:bold;">(a variable pased from controller)</span></em><br/>';
	
	// An app import from app/vendor/ folder
	App::import('Vendor','example'); 
	echo '<br/><em><span style="font-size:11px; font-weight:bold;">(a variable pased from vendor file invoking App::import';
	echo '<br/>which is kind of like "include" or "require")</span></em><br/>';
	
	// An extra note
	echo '<br/><br/><hr/><br/><br/>Please note : this page runs WITHOUT a model file by using var "$uses = array();" <br/>in its controller instead of calling a model';
	
	
	?>
</div>
<div class="actions">
	<?php 
	
	// A request action from plugin
	$menuRequested = $this->requestAction('/menuleft/menucats/rendermenu', array('return'));
	echo $menuRequested;
	echo '<br/><em><span style="font-size:11px; font-weight:bold;">(a menu from a plugin included by invoking a requestAction(). ';
	echo 'It is however a better idea to use an cake element for menus,';
	echo 'this is just for the sake of working with a plugin.<br/><br/>Please note, this plugin a database dependant)</span></em><br/>';
	
	?>
</div>
