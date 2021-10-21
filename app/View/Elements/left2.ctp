
<div id="mainLeft" style="height: 735px;">
	<?php if(isset($user['User']['photo'])){
		$photo = $user['User']['photo'];
	}else{
		$photo = "/img/personne.jpg";
	} ?>
	<img src="<?php echo $photo ?>" alt="member2" class="memberImg2"
		style="width: 88%; max-height: 100px;" />


	<p class="center">

		<?php if(!empty($user['User']['linkedin'])) :?>
		<a href="<?php echo $user['User']['linkedin'] ?>"><img
			src="/img/accueil_125.gif" alt="social icon" /> </a>
		<?php endif; ?>

		<?php if(!empty($user['User']['viadeo'])) :?>
		<a href="<?php echo $user['User']['viadeo'] ?>"><img
			src="/img/accueil_127.gif" alt="social icon" /> </a>
		<?php endif; ?>
		<?php if(!empty($user['User']['twitter'])) :?>
		<a href="<?php echo $user['User']['twitter'] ?>"><img
			src="/img/accueil_129.gif" alt="social icon" /> </a>
		<?php endif; ?>
		<?php if(!empty($user['User']['facebook'])) :?>
		<a href="<?php echo $user['User']['facebook'] ?>"><img
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
					<p><?php echo $user['User']['lastname'] ?>, <?php echo $user['User']['firstname'] ?></p>
					<p><?php echo $user['User']['fonction'] ?></p>
					<p><?php echo $user['User']['societe'] ?></p>
					<p>Membre AM fineXchange</p>
				</div>
				-->



	<img src="/img/profil_contenu_22.gif" alt="line" />
	<div class="part">
		<h1>
			<?php echo $user['User']['statut'] ?>
		</h1>
		<p>
			<span><?php echo $user['User']['membership'] ?> </span>
		</p>
		<p>
			<?php echo $user['User']['firstname'] ?>
			<?php echo $user['User']['lastname'] ?>
			a un droit d'acc&#232;s
			<?php echo $user['User']['membership'] ?>
		</p>
		<p>
			<a href="/users/membres">Voir tous les profils</a>
		</p>
	</div>
	<img src="/img/profil_contenu_22.gif" alt="line" />
</div>
