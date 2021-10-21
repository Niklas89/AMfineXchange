<!DOCTYPE html>
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php
echo $this->Html->meta('icon');

echo $this->Html->css('bootstrap');
echo $this->Html->css('smoothness/jquery-ui-1.8.16.custom');
echo $this->Html->css('wysiwyg');
echo $this->Html->script('/js/jquery-1.7.min');
echo $this->Html->script('/js/jquery-ui-1.8.16.custom.min');
echo $this->Html->script('/uploadify/swfobject');
echo $this->Html->script('/js/bootstrap-twipsy');

echo $this->Html->script('/js/bootstrap-popover');
echo $this->Html->script('/js/bootstrap-modal');
echo $this->Html->script('/js/addby');
echo $this->Html->css('li-scroller');
echo $this->Html->script('/js/jquery.li-scroller.1.0');
echo $this->Html->script('/js/masked');
echo $this->Html->css('aristo/style');


echo $this->Html->css('main');
echo $this->Html->css('addon');
?>


<?php
echo $scripts_for_layout;
?>

<link href="/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<meta name="google-site-verification"
	content="c9PhrLFnffd2vj5lA9D_BgHvmP-qfGJKc53qinJ_33c" />
<!--<script type="text/javascript" src="/uploadify/jquery-1.4.2.min.js"></script>-->
<script type="text/javascript" src="/uploadify/swfobject.js"></script>
<script type="text/javascript"
	src="/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="/users/js"></script>

</head>
<body>

	<div style="width: 50%; margin: auto; margin-left: 50%;">
		<?php $this->requestAction('/ads/showfooter/2') ?>
	</div>
	<div id="modal-from-dom" class="modal hide fade" style="display: none;">
		<div class="modal-header">
			<a href="#" class="close">×</a>
			<h3>Information</h3>
		</div>
		<div class="modal-body">
			<p id="thep">Votre message d'état a bien été sauvegardé</p>
		</div>

	</div>

	<?php 
	if($this->request->params['action'] != "signup"){
		?>

	<div id="modal-from-dom2" class="modal hide fade"
		style="display: none;">
		<div class="modal-header">
			<a href="#" class="close">×</a>
			<h3>Bienvenue dans AM fineXchange</h3>
		</div>
		<div class="modal-body">
			<div class="vidamfine2"
				style="width: 277px; margin-left: 128px; margin-bottom: 11px;">
				<iframe src="http://player.vimeo.com/video/33964646?color=ffffff"
					width="277" height="156" ></iframe>
			</div>

			<?php $this->requestAction('/pages/showfooter/33') ?>
			<div id="right" class="ontopright">

				<div class="first2" style="width: 330px;">
					<h3>Access Membre</h3>
				</div>
				<div class="second2" style="width: 330px;">
					<form action="/users/login" id="UserLoginForm" method="post">
						<div style="display: none;">
							<input type="hidden" name="_method" value="POST">
						</div>
						<p>
							Adresse &#233;lectronique <input class="in1"
								style="margin-left: 13px;" type="text" name="data[User][email]" />
						</p>
						<p style="padding-left: 43px;">
							Mot de passe <input class="in2" type="password"
								name="data[User][password]" />
						</p>
						<p class="check ">
							<input type="checkbox" id="checkbox" />Rester connect&#233; sur
							cet ordinateur
						</p>

						<p class="fortget">
							<a href="/users/rappel">Mot de passe oubli&#233; ?</a>
						</p>
						<button
							style="float: right; background: url(/img/log_in_14.gif) repeat-x; color: #fff; border-top: 1px solid #f0b7bb; border-right: 1px solid #862e33; border-bottom: 1px solid #380404; border-left: 1px solid #be7074; height: 16px; margin-right: 27px; margin-top: 2px; font-size: 11px; cursor: pointer; margin-top: 34px; margin-bottom: -24px;"
							class="butty">Accédez a AMfineXchange</button>
					</form>
				</div>
			</div>

		</div>

	</div>
	<?php	
	}

	?>



	<div id="container">
		<?php echo $this->element('topmenu') ?>


		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<div id="mainContent"
				style="font-family: Tahoma; text-align: justify;">
				<?php echo $content_for_layout; ?>
			</div>
			<?php if($_SERVER['REQUEST_URI'] != "/users/infonews/"  && $_SERVER['REQUEST_URI'] != "/users/infonews"): ?>

			<?php echo $this->element('sidebar') ?>
			<?php endif; ?>

		</div>

		<div style="clear: both; height: 1px;"></div>
		<div class="topp" style="width: 50%; margin-left: 50%;">
			<?php $this->requestAction('/ads/showfooter/3') ?>
		</div>
		<?php echo $this->element('footer') ?>


		<div class="foot2"></div>

	</div>
	<?php echo $this->element('sql_dump'); ?>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5902519-4']);
  _gaq.push(['_setDomainName', '.amfinexchange.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
