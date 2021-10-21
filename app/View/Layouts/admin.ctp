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
echo $this->Html->css('aristo/style');
echo $this->Html->script('/js/bootstrap-modal');



echo $scripts_for_layout;
?>

</head>
<body>

	<div class="topbar">
		<div class="topbar-inner">
			<div class="container" style="width: 1300px;">
				<h3>
					<a href="/admin/pages/index">Admin</a>
				</h3>


				<?php if ($me['User']['role'] == 3): ?>
				<ul class="menu">
					<li><?php echo $this->Html->link("Discussions",array('action'=>'index','controller'=>'forums')); ?>
					</li>
					<li><?php echo $this->Html->link("Gestion des commentaires",array('action'=>'index','controller'=>'comments')); ?>
					</li>
					<li><a style="color: white;" href="/">Voir le site</a></li>
				</ul>
				<?php else: ?>
				<ul class="menu">
					<li><?php echo $this->Html->link("Gestion des pages",array('action'=>'index','controller'=>'pages')); ?>
					</li>
					<li><?php echo $this->Html->link("Gestion des utilisateurs",array('action'=>'index','controller'=>'users')); ?>
					</li>
					<li><?php echo $this->Html->link("Tokens",array('action'=>'token','controller'=>'users')); ?>
					</li>
					<li><?php echo $this->Html->link("Discussions",array('action'=>'index','controller'=>'forums')); ?>
					</li>
					<li><?php echo $this->Html->link("Gestion des commentaires",array('action'=>'index','controller'=>'comments')); ?>
					</li>

					<li><?php echo $this->Html->link("Evènements",array('action'=>'index','controller'=>'events')); ?>
					</li>
					<li><?php echo $this->Html->link("Sondages",array('action'=>'index','controller'=>'sondages')); ?>
					</li>
					<li><?php echo $this->Html->link("Emailing",array('action'=>'emailing','controller'=>'users')); ?>
					</li>
					<li><?php echo $this->Html->link("Pages produits",array('action'=>'index','controller'=>'products')); ?>
					</li>
					<li><?php echo $this->Html->link("Config",array('action'=>'index','controller'=>'ads')); ?>
					</li>
					<li><a style="color: white;" href="/">Voir le site</a></li>
				</ul>
				<?php endif ?>
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo $this->Session->flash() ?>
		<?php echo $content_for_layout; ?>
	</div>


	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

