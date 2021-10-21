<!DOCTYPE html>
<html class="ui-mobile-rendering">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-appcapable" content="yes">
	<title><?php echo $title_for_layout; ?></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	
	<?php
	echo $this->Html->css('/css/mobile.css');
	echo $this->Html->css('/js/jqmobile/jquery.mobile.css');
	echo $this->Html->css('/js/jqmobile/jquery.mobile.structure.css');
	echo $this->Html->script('/js/jqmobile/jquery.mobile.js');
	echo $this->Html->script('/js/jquery-1.7.min.js');
	echo $scripts_for_layout;
	?>
	
</head>
<body>
<div id="homePage" class="homeBody ui-page ui-body-o ui-page-active" data-theme="o" data-role="page" tabindex="0">
	
	<?php echo $content_for_layout; ?>

</div>
</body>
</html>