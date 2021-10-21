<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
		<?php
				echo $this->Html->meta('icon');
				echo $this->Html->css('bootstrap');
				echo $this->Html->css('main');
				echo $this->Html->css('addon');
				echo $scripts_for_layout;
		?>

</head>
<body>

<div id="container">
		
			<?php echo $this->element('topmenu') ?>

	
	<div id="content">
		
				<?php echo $this->Session->flash(); ?>
<div id="mainContent">
			<?php echo $content_for_layout; ?>
		</div>
		
<?php echo $this->element('sidebar') ?>
	</div>
	<div style="clear:both;height:1px;"></div>
<?php echo $this->element('footer') ?>
	
</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>