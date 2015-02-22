<div class="groups view">
<h2><?php  __('Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($group['ParentGroup']['groupName'], array('controller' => 'groups', 'action' => 'view', $group['ParentGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('GroupName'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['groupName']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('QuestionTemplate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['questionTemplate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group', true), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Group', true), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batchop', true), array('controller' => 'batchops', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Groups');?></h3>
	<?php if (!empty($group['ChildGroup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('GroupName'); ?></th>
		<th><?php __('QuestionTemplate'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['ChildGroup'] as $childGroup):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childGroup['id'];?></td>
			<td><?php echo $childGroup['parent_id'];?></td>
			<td><?php echo $childGroup['groupName'];?></td>
			<td><?php echo $childGroup['questionTemplate'];?></td>
			<td><?php echo $childGroup['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'groups', 'action' => 'view', $childGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'groups', 'action' => 'edit', $childGroup['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'groups', 'action' => 'delete', $childGroup['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Group', true), array('controller' => 'groups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Questions');?></h3>
	<?php if (!empty($group['Question'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Group Id'); ?></th>
		<th><?php __('QuestionField'); ?></th>
		<th><?php __('EfficaceUtilitaire'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Question'] as $question):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $question['id'];?></td>
			<td><?php echo $question['group_id'];?></td>
			<td><?php echo $question['questionField'];?></td>
			<td><?php echo $question['efficaceUtilitaire'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'questions', 'action' => 'delete', $question['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add'));?> </li>
		</ul>
	</div>
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
			'Group' => $group
		);
		
		echo $makenice->doDataMap($toBeMapped); 

		// $this->Session->delete('pageData');
		
?>
<!-- END To be mapped -->