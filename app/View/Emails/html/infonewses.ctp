
<img
	style="width: 248px;" src="http://www.amfinexchange.com/logoemail.jpg"
	alt="" />
<br>


<p>Bulletin d'information AmfineXchange</p>


<?php if(isset($d['l1s2data']) && !empty($d['l1s2data'])): ?>
<h3>Les nouveaux membres</h3>

<ul>
	<?php foreach ($d['l1s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/users/profilvoir/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname'] ?>
			<?php echo $v['User']['lastname'] ?> </a></li>
	<?php endforeach ?>
</ul>

<?php endif; ?>


<?php if(isset($d['l2s2data'])&& !empty($d['l2s2data'])): ?>
<h3>L'activité de mes contacts</h3>

<ul>
	<?php foreach ($d['l2s2data'] as $k => $v): ?>
	<li><?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?> <?php switch ($v['Activity']['type']) {
		case 'discussion':
			echo "a participé à une discussion";
			break;

		case 'eventcom':
			echo "a commenté un évènement";
			break;

		case 'pagecom':
			echo "a commenté une page";
			break;

		case 'participe':
			echo "participera à un évènement";
			break;

	} ?> - <?php switch ($v['Activity']['type']) {
		case 'discussion':
			echo '<a href="http://www.amfinexchange.com/forums/show/'.$v['Activity']['additionnal'].'">Voir la discussion</a>';
			break;

		case 'eventcom':
			echo '<a href="http://www.amfinexchange.com/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
			break;

		case 'pagecom':
			echo '<a href="http://www.amfinexchange.com/pages/show/'.$v['Activity']['additionnal'].'">Voir la page</a>';
			break;

		case 'participe':
			echo '<a href="http://www.amfinexchange.com/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
			break;

	} ?>
	</li>
	<?php endforeach ?>
</ul>

<?php endif; ?>

<?php if(isset($d['l3s2data'])&& !empty($d['l3s2data'])): ?>
<h3>Les nouveaux partenaires</h3>
<ul>
	<?php foreach ($d['l3s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/users/profilvoir/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname'] ?>
			<?php echo $v['User']['lastname'] ?> </a></li>
	<?php endforeach ?>
</ul>

<?php endif; ?>

<?php if(isset($d['l4s2data'])&& !empty($d['l4s2data'])): ?>
<h3>L'activité de ses partenaires</h3>

<ul>
	<?php foreach ($d['l4s2data'] as $k => $v): ?>
	<li><?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?> <?php switch ($v['Activity']['type']) {
		case 'discussion':
			echo "a participé à une discussion";
			break;

		case 'eventcom':
			echo "a commenté un évènement";
			break;

		case 'pagecom':
			echo "a commenté une page";
			break;

		case 'participe':
			echo "participera à un évènement";
			break;

	} ?> - <?php switch ($v['Activity']['type']) {
		case 'discussion':
			echo '<a href="http://www.amfinexchange.com/forums/show/'.$v['Activity']['additionnal'].'">Voir la discussion</a>';
			break;

		case 'eventcom':
			echo '<a href="http://www.amfinexchange.com/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
			break;

		case 'pagecom':
			echo '<a href="http://www.amfinexchange.com/pages/show/'.$v['Activity']['additionnal'].'">Voir la page</a>';
			break;

		case 'participe':
			echo '<a href="http://www.amfinexchange.com/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
			break;

	} ?>
	</li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l5s2data'])&& !empty($d['l5s2data'])): ?>
<h3>Les prochains évènements</h3>
<ul>
	<?php foreach ($d['l5s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $v['Event']['baseline'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l6s2data'])&& !empty($d['l6s2data'])): ?>
<h3>Le compte rendu des évènements</h3>
<ul>
	<?php foreach ($d['l6s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l7s2data'])&& !empty($d['l7s2data'])): ?>
<h3>Les nouveaux posts (articles, vidéos)</h3>
<ul>
	<?php foreach ($d['l7s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>




<?php if(isset($d['l9s2data'])&& !empty($d['l9s2data'])): ?>
<h3>Les nouvelles discussions</h3>
<ul>
	<?php foreach ($d['l9s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/forums/show/<?php echo $v['Forumsujet']['id'] ?>"><?php echo $v['Forumsujet']['sujet'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l10s2data'])&& !empty($d['l10s2data'])): ?>
<h3>Les nouveaux messages</h3>
<ul>
	<?php foreach ($d['l10s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/forums/show/<?php echo $v['Forum']['forumsujet_id'] ?>"><?php echo $v['Forum']['sujet'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l11s2data'])&& !empty($d['l11s2data'])): ?>
<h3>Uniquement sur les discussions auxquelles je participe</h3>
<ul>
	<?php foreach ($d['l11s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/forums/show/<?php echo $v['Forumsujet']['id'] ?>"><?php echo $v['Forumsujet']['sujet'] ?>
	</a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?php if(isset($d['l13s2data'])&& !empty($d['l13s2data'])): ?>
<h3>Mes récentes visites</h3>
<ul>
	<?php foreach ($d['l13s2data'] as $k => $v): ?>
	<li><a
		href="http://www.amfinexchange.com/users/profilvoir/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname'] ?>
			<?php echo $v['User']['lastname'] ?> </a></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>



<p>
	Cordialement, <br> Bénédicte Marquetty <br> Community Manager
	AMfineXchange <br> bmarquetty@amfinexchange.com
</p>
<p>Sans réponse de notre part sous 48h, vous pouvez nous contacter au
	+33(0)1.80.96.41.60.</p>
