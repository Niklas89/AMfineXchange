<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon');
echo $this->Html->css('bootstrap');
echo $this->Html->css('main');
echo $this->Html->css('addon');
echo $this->Html->css('smoothness/jquery-ui-1.8.16.custom');
echo $this->Html->script('/js/jquery-1.7.min');
echo $this->Html->script('/js/jquery-ui-1.8.16.custom.min');

echo $scripts_for_layout;
?>

</head>
<body>


	<div class="container">
		<?php echo $this->Session->flash() ?>
		<?php echo $content_for_layout; ?>
	</div>


	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

