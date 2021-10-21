<?php $this->set('title_for_layout', 'Best Practices'); ?>
<div data-role="header" data-theme="a">
	<h1>Best Practices</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->

	<div data-role="content" data-theme="d">
		<ul data-role="listview" data-inset="true">
			<li>
				<a href="<?php echo $this->Html->url('etude_de_cas'); ?>">
					<h3>Etude de cas</h3>
					<p>Proposer un article, une vidéo</p>
				</a>	
			</li>	
			<li>
				<a href="<?php echo $this->Html->url('discussions'); ?>">
					<h3>Les discussions</h3>
					<p>Accédez aux discussions</p>
				</a>	
			</li>	
			<li>
				<a href="<?php echo $this->Html->url('faq'); ?>">
					<h3>FAQ</h3>
					<p>Demande de rajout de FAQ</p>
				</a>	
			</li>	
		</ul>
	</div>
<?php echo $this->element('footer_mobile'); ?>