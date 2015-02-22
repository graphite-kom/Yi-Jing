<div class="loops form">
<?php echo $this->Form->create('Loop');?>
	<fieldset>
 		<legend><?php __('Add Loop'); ?></legend>
	<?php
		if(empty($loops)){
			echo 'Loops is not set';
			echo $this->Form->hidden('parent_id', array('default' => '0'));
		}else{
			echo 'Loops is set to :\''.$loops.'\'<br/><br/>';	
			
			$options = array('0' => 'None');
			
			foreach($loops as $key => $value){
				$options[] = $value;
			}
			
			/*foreach($options as $key => $value){
				echo $key.' => '.$value.'<br/><br/>';	
			}*/
			
			echo $this->Form->input('parent_id', array('label' => 'Parent n.','options' => $options));
		}
		
		echo $this->Form->input('element');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Loops', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Loops', true), array('controller' => 'loops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loop', true), array('controller' => 'loops', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div style="clear:both;"><?php echo $makenice->makenice($loops); ?></div>