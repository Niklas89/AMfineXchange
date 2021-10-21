<?php $this->set('title_for_layout', 'Index'); ?>	
<div data-role="header" data-theme="a">
	<h1>AMFineXchange</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
<div class='home-btn'>
	<div class="ui-grid-b">
		<div class="ui-block-a">
			<?php echo $this->Html->image("/img_mobile/actus2.png", array(
							"alt" => "Actus",
							'url' => array('controller' => 'mobile', 'action' => 'actus')
							));
			?>
		</div>	
		<div class="ui-block-b">
			<?php echo $this->Html->image("/img_mobile/best-practices2.png", array(
						    "alt" => "Best Practices",
						    'url' => array('controller' => 'mobile', 'action' => 'bestpractices')
						    ));
			?>
		</div>
		<div class="ui-block-c">
			<?php echo $this->Html->image('/img_mobile/discussions2.png', array(
							'alt' => 'Discussions',
							'url' => array('controller' => 'mobile', 'action' => 'discussions')
							));
			?>
		</div>
	</div><!-- /grid-b -->
	<div class="ui-grid-b">
		<div class="ui-block-a">
			<a href="#">
				<?php echo $this->Html->image('/img_mobile/observatoire2.png', array('alt' => 'Observatoire'))?>
			</a>
		</div>	
		<div class="ui-block-b">
			<?php echo $this->Html->image('/img_mobile/communaute2.png', array(
							'alt' => 'Communauté',
							'url' => array('controller' => 'mobile', 'action' => 'communaute')
							));
			?>
		</div>
		<div class="ui-block-c">
			<a href="#">
				<?php echo $this->Html->image('/img_mobile/user-club2.png', array('alt' => 'User Club'))?>
			</a>
		</div>
	</div><!-- /grid-b -->
	<div class="ui-grid-b">
		<div class="ui-block-a">
			<?php echo $this->Html->image('/img_mobile/events2.png', array(
							'alt' => 'Events',
							'url' => array('controller' => 'mobile', 'action' => 'nextevents')
							));
			?>
		</div>	
		<div class="ui-block-b">
			<a href="#">
				<?php echo $this->Html->image('/img_mobile/legal-room2.png', array('alt' => 'Legal Room'))?>
			</a>
		</div>
		<div class="ui-block-c">
			<a href="#">
				<?php echo $this->Html->image('/img_mobile/produits2.png', array('alt' => 'Produits'))?>
			</a>
		</div>
	</div><!-- /grid-b -->
</div>

<?php echo $this->element('footer_mobile'); ?>