<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<!--  Marker - 1  -->
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		
		// echo $this->Html->css('cake.yijing');
		
		echo $this->Html->css('cake.yijing-view-hexagram');
		
		echo $this->Html->css('cake.yijing-view-hexagram-specific');
		
		//Tell cakePHP thet jQuery object should now be written as 'jQuery'
		$this->Js->JqueryEngine->jQueryObject = 'jQuery';
		//Tell jQuery to go into noconflict mode
		echo '<script type="text/javascript">//<![CDATA[jQuery.noConflict();//]]></script>';
		
		echo $this->Html->script(array('jQuery/jquery-1.4.4.min', 'jQuery/jquery-ui-1.8.9.custom.min.js', 'ckeditor/ckeditor', 'swfobject/swfobject', 'general/otherJSfunctions', 'general/UniToolBox'/*, 'general/firebug-lite.js'*/));
				
		echo $scripts_for_layout;
	
	?>
	<!--  Marker -->
</head>
<body>
	<div style="background-color:#FF0000;">&nbsp;</div>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>
					
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(array('wrapCallbacks' => false)); ?>
</body>
</html>