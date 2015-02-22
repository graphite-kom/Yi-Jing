<!-- START Hexagram View-->
<?php 
	if (isset($hexagram['Hexagram']['id'])) {
		
		$swfObject = 'var flashvars = {};';
		$swfObject .= 'flashvars.hexagram_id = "'.$hexagram['Hexagram']['id'].'";';
		$swfObject .= 'flashvars.hexagram_url = "'.$_SERVER['SERVER_NAME'].$html->url(array('controller' => 'relationships', 'action' => 'flashData', $hexagram['Hexagram']['id'])).'";';
		$swfObject .= 'var params = {};';
		$swfObject .= 'params.menu = "false";';
		$swfObject .= 'params.scale = "noscale";';
		$swfObject .= 'params.wmode = "transparent";';
		$swfObject .= 'params.swliveconnect = "true";';
		$swfObject .= 'params.allowscriptaccess = "always";';
		$swfObject .= 'var attributes = {};';
		$swfObject .= 'swfobject.embedSWF("'.$html->url('/flash/realtionships3.swf').'", "alternateContent", "185", "210", "9.0.0", "'.$html->url('/js/swfobject//expressInstall.swf').'", flashvars, params, attributes);';
		
		// write swfObject to page header
		$this->Html->scriptBlock($swfObject, array('inline' => false));
		
	}
?>

<div class="hexagrams view">
<h2><?php  __('Hexagram');?></h2>
	<!-- //////////////////////////////////////////////// -->
	<!-- START header -->
	<div class="hexViewHeader">
		<div class="hexagramHeader-th"><?php __('Question'); ?> : <?php echo $this->Html->link($hexagram['Question']['questionField'], array('controller' => 'questions', 'action' => 'view', $hexagram['Question']['id'])); ?></div>
		<div class="hexagramHeader"><?php __('Efficace Utilitaire'); ?> : <span class="hexAttribute"><?php echo $hexagram['Question']['efficaceUtilitaire']; ?></span></div>
		<div class="hexagramHeader"><?php __('Element'); ?> : <span class="hexAttribute"><?php echo $hexagram['Hexagram']['element']; ?></span></div>
		<div class="hexagramHeader"><?php __('Created'); ?> : <span class="hexAttribute"><?php echo $hexagram['Hexagram']['created']; ?></span></div>
		<div class="hexagramHeaderBreak"><?php __('Annee'); ?> : <span class="chDate"><?php echo $hexagram['Hexagram']['anneeTronc']; ?> <?php echo $hexagram['Hexagram']['anneeBranche']; ?></span></div>
		<div class="hexagramHeader"><?php __('Mois'); ?>: <span class="chDate"><?php echo $hexagram['Hexagram']['moisTronc']; ?> <?php echo $hexagram['Hexagram']['moisBranche']; ?></span></div>
		<div class="hexagramHeader"><?php __('Jour'); ?> : <span class="chDate"><?php echo $hexagram['Hexagram']['jourTronc']; ?> <?php echo $hexagram['Hexagram']['jourBranche']; ?></span></div>
	</div>
	<!-- END header -->
	<div style="clear:both;">&nbsp;</div>
	<!-- START Related Traits-->
	<!-- //////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- hide this for the time being
	<div class="related">
	<?php /* if (!empty($hexagram['Trait'])): */ ?>
		<table cellpadding = "0" cellspacing = "0" style="width:auto;">
			<tr>
				<th><?php /* __('Id');  */ ?></th>
				<th><?php  /* __('Hexagram Id'); */ ?></th>
				<th><?php  /* __('TraitValue'); */ ?></th>
				<th class="actions"><?php /*  __('Actions'); */ ?></th>
			</tr>
			<?php /* 
				$i = 0;
				foreach ($hexagram['Trait'] as $trait):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				*/ ?>
			<tr<?php  /* echo $class; */ ?>>
				<td><?php   /* echo $trait['id']; */ ?></td>
				<td><?php   /* echo $trait['hexagram_id']; */ ?></td>
				<td><?php   /* echo $trait['traitValue']; */ ?></td>
				<td class="actions"> -->
					<?php   /* echo $this->Html->link(__('View', true), array('controller' => 'traits', 'action' => 'view', $trait['id'])); */  ?>
					<!--<?php /* echo $this->Html->link(__('Edit', true), array('controller' => 'traits', 'action' => 'edit', $trait['id'])); */ ?> -->
					<?php /* echo $this->Html->link(__('Delete', true), array('controller' => 'traits', 'action' => 'delete', $trait['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $trait['id'])); */ ?>
				<!-- 
				 </td>
			</tr>
			<?php  /* endforeach; */  ?>
		</table>
	<?php  /* endif;  */ ?>
	</div>
	-->
	<!-- END Related Traits-->
</div>

<!-- END Hexagram View-->
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Edit Hexagram', true), array('action' => 'edit', $hexagram['Hexagram']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Hexagram', true), array('action' => 'delete', $hexagram['Hexagram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hexagram['Hexagram']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hexagrams', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<!-- 
		<li><?php /* echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); */ ?> </li>
		<li><?php /* echo $this->Html->link(__('List Traits', true), array('controller' => 'traits', 'action' => 'index')); */ ?> </li>
		<li><?php /* echo $this->Html->link(__('New Trait', true), array('controller' => 'traits', 'action' => 'add')); */ ?> </li>
		 -->
	</ul>
</div>
	<!-- START Hexagram display -->
	<?php
		echo '<div class="mainDiv"><div class="mainCell">';
		echo $renderHexagram->doRenderHexagram($hexagram).'<br/><br/>';
		/////
		echo '<!-- START Comment form -->';
		echo '<div id="titleAddComment" style="background-color:#006666;clear:both; margin:10px 0 0 0;" onclick="javascript:showAddComment();">';
		echo '<div style="margin:0 20px; padding:10px 0; color:ffffff;">Add a comment +</div>';
		echo '</div>';
		///
		echo '<div id="displayAddComment" style="clear:both; margin:10px 0 0 0; display:none;">';
		echo '<div style="margin:0 20px; padding:10px 0; color:ffffff;" onclick="javascript:hideAddComment();">Hide comment form -</div>';
		echo '<div class="addCommentDiv">';
		echo $this->Form->create(null, array('url' => array('action' => 'hexagramComment')));
		echo $this->Form->hidden('Comment.0.hexagram_id', array('default' => $hexagram['Hexagram']['id']));
		echo $this->Form->textarea('Comment.0.comment', array('class' => 'ckeditor', 'default' => 'Please no more than 1800 characters'));
		echo $this->Form->end(__('Submit', true));
		echo '</div></div>';
		echo '<!-- END Comment form -->';
		
		
		/////
		if (!empty($hexagram['Comment'])) {
			echo '<!-- START display comments -->';
			echo '<div class="addCommentDiv">';
			
			foreach ($hexagram['Comment'] as $comment){
				echo '<div class="commentDiv"><div>'.$comment['comment'].'<div class="commentDate">'.$comment['created'].'</div></div></div>';	
			}	
			
			echo '</div>';
			echo '<!-- END display comments -->';
		}
		/////

		
		echo '</div></div>';
	?>
	<!-- END Hexagram display -->

<!-- START To be mapped -->
<?php 
	
		///
		/*
		if(Set::check($this->Session->read('letsSeeAllThisData'))){
			$letsSeeAllThisData = $this->Session->read('letsSeeAllThisData');
		}else{
			$letsSeeAllThisData = '';
		}*/
		
		
		$toBeMapped = array(
			'Hexagram' => $hexagram,
			'pageData' => $pageData
			// 'letsSeeAllThisData' => $letsSeeAllThisData 
		);
		
		echo $makenice->exportMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
		/*
		echo '<div style="clear:both; background-color:#ff0000; padding:20px">';
		$exported = $makenice->showDebug($toBeMapped);
		echo $exported;
		echo '</div>';
		*/
?>
<!-- END To be mapped -->