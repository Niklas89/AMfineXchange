<img style="width: 248px;"
	src="http://www.amfinexchange.com/logoemail.jpg" alt="" />
<br>

<p>
	Bonjour
	<?php echo $username ?>
</p>

<p>Vous recevez cet email car vous venez de configurer vos infonews au
	sein d’ AMfineXchange.</p>
<p>Voici un récapitulatif de vos sélections.</p>

<?php 
/**
 * Retourne nbxmois
 **/
function retourne($entier){
	switch ($entier) {
		case '1':
			return "1x par semaine";
			break;
		case '2':
			return "2x par mois";
			break;
		case '3':
			return "1x par mois";
			break;
		case '4':
			return "1x tous les 2 mois";
			break;

	}
}
?>
<h3>Communauté</h3>
<p>
	Les nouveaux membres
	<?php echo retourne($data['l1s2']) ?>
	<?php if ($data['l14s2'] == 1): ?>
	+ SMS 1x par semaine
	<?php endif ?>
</p>
<p>
	L'activité de ses contacts
	<?php echo retourne($data['l2s2']) ?>
</p>
<p>
	Les nouveaux partenaires
	<?php echo retourne($data['l3s2']) ?>
</p>
<p>
	L'activité de ses partenaires
	<?php echo retourne($data['l4s2']) ?>
</p>
<h3>Evènement</h3>
<p>
	Les prochains évènements
	<?php echo retourne($data['l5s2']) ?>
	<?php if ($data['l15s2'] == 1): ?>
	+ SMS 1x par semaine
	<?php endif ?>
</p>
<p>
	Le compte rendu des évènements
	<?php echo retourne($data['l6s2']) ?>
</p>
<h3>Information</h3>
<p>
	Les nouveaux posts (articles, vidéos)
	<?php echo retourne($data['l7s2']) ?>
</p>
<h3>Discussions</h3>
<p>
	Les nouvelles discussions
	<?php echo retourne($data['l9s2']) ?>
</p>
<p>
	Les nouveaux messages
	<?php echo retourne($data['l10s2']) ?>
</p>
<p>
	Uniquement sur les discussions auxquelles je participe
	<?php echo retourne($data['l11s2']) ?>
</p>
<h3>Qui a visité mon profil</h3>
<p>
	Les récentes visites
	<?php echo retourne($data['l13s2']) ?>
</p>



<p>Vous pourrez à tout moment modifier vos préférences en retournant
	dans la rubrique « Mes Infonews » depuis votre compte.</p>

<p>
	Cordialement, <br> Bénédicte Marquetty <br> Community Manager
	AMfineXchange <br> bmarquetty@amfinexchange.com
</p>
