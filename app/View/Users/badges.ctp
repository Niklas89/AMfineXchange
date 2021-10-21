<?php $this->set('title_for_layout',"AmfineXchange | Génération des badges"); ?>

<div id="mainRight">




	<div class="page-header">
		<h1>Génération de votre Badge</h1>

	</div>
	<div class="well">
		<h1>Configuration</h1>
		<table class="spe">
			<tr>
				<td><input type="radio" value="1" name="taille" id="petit"
					checked="checked" />Petit</td>
				<td><input type="radio" value="1" name="taille" id="grand" />Grand</td>
			</tr>
		</table>
		<img id="picbadge" src="/img/badgesmall.jpg" /> <br />
		<h1>Code généré</h1>
		<textarea cols="10" rows="10" id="textbadges"
			style="width: 386px; margin-left: 5px; margin-top: 11px;">
<a href="http://www.<?php echo Configure::read('site.domain'); ?>"><img
				src="http://www.<?php echo Configure::read('site.domain'); ?>/img/badgesmall.jpg"
				alt="AmfineXchange">
			</a>

</textarea>
		<a id="linkimage"
			href="http://www.<?php echo Configure::read('site.domain'); ?>/img/badgesmall.jpg">Télécharger
			l'image</a>
	</div>




</div>




