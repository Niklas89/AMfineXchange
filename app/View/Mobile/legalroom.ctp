<?php $this->set('title_for_layout',"Legal Room"); ?>
<div data-role="header" data-theme="a">
	<h1>Legal Room</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">

<?php echo $this->Html->image('2012/01/legalroom1325710067.jpg"', array('style' => 'width:350px;')); ?>
<p><iframe src="http://player.vimeo.com/video/33967784" frameborder="0" width="400" height="300"></iframe></p>
<p>&nbsp;</p>
<div style="width:400px;margin:auto;">
<p>Vous venez d’entrer dans la Legal Room, le centre d’informations réglementaire.
Cet espace vous est entièrement dédié.
Vous pourrez y retrouver rapidement un certain nombre d’informations relatives à votre métier, les réglementations en cours, à venir, leurs domaines d’application, leurs objectifs…
Accédez également aux discussions sur des thèmes spécifiques alimentées par vous, les partenaires et soumis à modération par une équipe d’experts partenaires.<br />
<a href="partenaires.ctp" title="Nos partenaires">Voir nos partenaires</a><br />N’hésitez pas à nous faire part de vos commentaires <a href="mailto:contact@amfinexchange.com" style="text-decoration: underline; "><span style="font-size: 10.0pt; mso-bidi-font-size: 11.0pt;">contact@amfinexchange.com</span></a></p>
</div>


		<ul data-role="listview" data-inset="true">
			<li><?php echo $this->Html->link("Calendrier réglementaire",array('controller'=>'mobile','action'=>'nextevents')); ?></li>
			<li><?php echo $this->Html->link("Discussions Legal Room",array('controller'=>'global','action'=>'discussions')); ?></li>
			<li><?php echo $this->Html->link("La \"loi\", les documents",array('controller'=>'global','action'=>'discussions')); ?></li>
		</ul>


</div>

<?php echo $this->element('footer_mobile'); ?>