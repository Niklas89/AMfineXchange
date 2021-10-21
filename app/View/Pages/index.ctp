<?php foreach ($pages as $k => $v): $v=current($v); ?>
	<?php echo $this->Html->link($v['name'],$v['link']); ?>
<?php endforeach ?>