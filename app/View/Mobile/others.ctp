<?php $this->set('title_for_layout', 'Autres'); ?>	
<div data-role="header" data-theme="a">
	<h1>Autres</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
	<div data-role="content" data-theme="d">

		<ul data-role="listview" data-inset="true">
			<li><?php echo $this->Html->link("Déconnexion",array('controller'=>'mobile','action'=>'logout')); ?></li>
			<li><?php echo $this->Html->link("Partenaire",array('controller'=>'global','action'=>'index')); ?></li>
			<li><?php echo $this->Html->link("Crédits",array('controller'=>'global','action'=>'index')); ?></li>
			<li><?php echo $this->Html->link("Mentions légales & CGU",array('controller'=>'global','action'=>'index')); ?></li>
			<li><?php echo $this->Html->link("Retourner au site classique",array('controller'=>'global','action'=>'index'),array('rel'=>"external")); ?></li>
		</ul>



	</div><!-- /content -->

<?php echo $this->element('footer_mobile'); ?>