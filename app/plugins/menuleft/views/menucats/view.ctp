<div class="menucats view">
<h2><?php  __('Menucat');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menucat['Menucat']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('MenucatField'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menucat['Menucat']['menucatField']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menucat', true), array('action' => 'edit', $menucat['Menucat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Menucat', true), array('action' => 'delete', $menucat['Menucat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menucat['Menucat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menucats', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menucat', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menulinks', true), array('controller' => 'menulinks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menulink', true), array('controller' => 'menulinks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Menulinks');?></h3>
	<?php if (!empty($menucat['Menulink'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Menucat Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Controller'); ?></th>
		<th><?php __('Action'); ?></th>
		<th><?php __('Idparam'); ?></th>
		<th><?php __('Optionsarray'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($menucat['Menulink'] as $menulink):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $menulink['id'];?></td>
			<td><?php echo $menulink['menucat_id'];?></td>
			<td><?php echo $menulink['title'];?></td>
			<td><?php echo $menulink['url'];?></td>
			<td><?php echo $menulink['controller'];?></td>
			<td><?php echo $menulink['action'];?></td>
			<td><?php echo $menulink['idparam'];?></td>
			<td><?php echo $menulink['optionsarray'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'menulinks', 'action' => 'view', $menulink['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'menulinks', 'action' => 'edit', $menulink['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'menulinks', 'action' => 'delete', $menulink['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menulink['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menulink', true), array('controller' => 'menulinks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
