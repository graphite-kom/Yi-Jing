<div class="questions view">
<h2><?php  __('Question');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('QuestionField'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['questionField']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('EfficaceUtilitaire'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $question['Question']['efficaceUtilitaire']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<!-- 
		<li><?php /* echo $this->Html->link(__('Edit Question', true), array('action' => 'edit', $question['Question']['id'])); */ ?> </li>
		<li><?php /* echo $this->Html->link(__('Delete Question', true), array('action' => 'delete', $question['Question']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['Question']['id'])); */  ?> </li>
		<li><?php /* echo $this->Html->link(__('List Hexagrams', true), array('controller' => 'hexagrams', 'action' => 'index')); */ ?> </li>
		 -->
		<li><?php echo $this->Html->link(__('List Questions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index'));?></li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Hexagrams');?></h3>
	<?php if (!empty($question['Hexagram'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Question Id'); ?></th>
		<th><?php __('Element'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('AnneeTronc'); ?></th>
		<th><?php __('AnneeBranche'); ?></th>
		<th><?php __('MoisTronc'); ?></th>
		<th><?php __('MoisBranche'); ?></th>
		<th><?php __('JourTronc'); ?></th>
		<th><?php __('JourBranche'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($question['Hexagram'] as $hexagram):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $hexagram['id'];?></td>
			<td><?php echo $hexagram['question_id'];?></td>
			<td><?php echo $hexagram['element'];?></td>
			<td><?php echo $hexagram['created'];?></td>
			<td><?php echo $hexagram['anneeTronc'];?></td>
			<td><?php echo $hexagram['anneeBranche'];?></td>
			<td><?php echo $hexagram['moisTronc'];?></td>
			<td><?php echo $hexagram['moisBranche'];?></td>
			<td><?php echo $hexagram['jourTronc'];?></td>
			<td><?php echo $hexagram['jourBranche'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'hexagrams', 'action' => 'view', $hexagram['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'hexagrams', 'action' => 'edit', $hexagram['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'hexagrams', 'action' => 'delete', $hexagram['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hexagram['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<!-- 
	<div class="actions">
		<ul>
			<li><?php /* echo $this->Html->link(__('New Hexagram', true), array('controller' => 'hexagrams', 'action' => 'add')); */ ?> </li>
		</ul>
	</div>
	 -->
</div>
<!-- START To be mapped -->
<?php 
	
		///
		/*
		if(Set::check($this->Session->read('pageData'))){
			$pageData = $this->Session->read('pageData');
		}else{
			$pageData = '';
		}*/
		
		
		$toBeMapped = array(
			'question' => $question
		);
		
		echo $makenice->doDataMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
?>
<!-- END To be mapped -->