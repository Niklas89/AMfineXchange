<div class="leftcss">

<div id="mainLeft" style="height: 735px;">
	<?php if(isset($me['User']['photo'])){
		$photo = $me['User']['photo'];
	}else{
		$photo = "/img/personne.jpg";
	} ?>
	<img src="<?php echo $photo ?>" alt="member" class="memberImg"
		style="width: 88%; max-height: 100px;" />


	<div class="modif">
		<p class="center">
			<a href="#">Modifier ma photo</a>
		</p>
	</div>
	<p class="center">
		<a id="uploadpic" href="#">Modifier ma photo</a>
	</p>
	<p class="center">

		<?php if(!empty($me['User']['linkedin'])) :?>
		<a href="<?php echo $me['User']['linkedin'] ?>"><img
			src="/img/accueil_125.gif" alt="social icon" /> </a>
		<?php endif; ?>

		<?php if(!empty($me['User']['viadeo'])) :?>
		<a href="<?php echo $me['User']['viadeo'] ?>"><img
			src="/img/accueil_127.gif" alt="social icon" /> </a>
		<?php endif; ?>
		<?php if(!empty($me['User']['twitter'])) :?>
		<a href="<?php echo $me['User']['twitter'] ?>"><img
			src="/img/accueil_129.gif" alt="social icon" /> </a>
		<?php endif; ?>
		<?php if(!empty($me['User']['facebook'])) :?>
		<a href="<?php echo $me['User']['facebook'] ?>"><img
			src="/img/accueil_131.gif" alt="social icon" /> </a>
		<?php endif; ?>



	</p>
	<img src="/img/profil_contenu_22.gif" alt="line" />
	<div class="part">

		<h1>Mes participations</h1>
		<?php foreach ($part as $k => $v): ?>
		<span><a style="font-weight: bold; margin-left: 11px;"
			href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $v['Event']['baseline'] ?>
		</a> </span><br />
		<?php endforeach ?>

	</div>


	<!--
				<img src="/img/profil_contenu_22.gif" alt="line" />
				<div class="part">
					<h1>Signature</h1>
					<p><?php echo $me['User']['lastname'] ?>, <?php echo $me['User']['firstname'] ?></p>
					<p><?php echo $me['User']['fonction'] ?></p>
					<p><?php echo $me['User']['societe'] ?></p>
					<p>Membre AM fineXchange</p>
				</div>
				-->



	<img src="/img/profil_contenu_22.gif" alt="line" />
	<div class="part">
		<h1>
			<?php echo $me['User']['statut'] ?>
		</h1>
		<p>
			<span><?php echo $me['User']['membership'] ?> </span>
		</p>
		<p>
			Vous avez un droit d'acc&#232;s
			<?php echo $me['User']['membership'] ?>
		</p>
		<p>
			<a href="/users/membres">Voir tous les profils</a>
		</p>
	</div>
	<img src="/img/profil_contenu_22.gif" alt="line" />
</div>

</div>