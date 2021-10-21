<?php $this->set('title_for_layout', 'FAQ'); ?>	
<div data-role="header" data-theme="a">
	<h1>FAQ</h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">
	<div class="well">
		<h1>FAQ</h1>
		<?php $this->requestAction('/pages/showfooter/49') ?>
	</div>
</div>
<?php echo $this->element('footer_mobile'); ?>