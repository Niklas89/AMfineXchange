                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
<div id="sidebar">

	<form action="/global/recherche" method="post">

		<p>
			<input type="text" name="search" id="search" value="Recherche"
				onClick="this.value=''" />

			<button id="searchButton">OK</button>
		</p>

	</form>

	<img src="/img/accueil_139.gif" alt="Divide Line" />

	<div class="sidebarNews">

		<img src="/img/accueil_54.gif" alt="sidebar news image" />

		<div class="sideNews">

			<h3>
				<?php echo $this->Html->link("Mes InfoNews",array('action'=>'infonews','controller'=>'users')); ?>
			</h3>

			<p>
				<a href="/users/infonews">Personnaliser</a>
			</p>

		</div>

	</div>

	<img src="/img/accueil_139.gif" alt="Divide Line" />

	<div class="sidebarNews ">

		<img src="/img/accueil_60.gif" alt="sidebar news image" />

		<div class="sideNews">

			<h3>
				<a href="/users/profil">PROFIL</a>
			</h3>

			<p>
				<a href="/users/profil">Mon profil</a>
			</p>

			<p>
				<?php echo $this->Html->link("Messagerie",array('action'=>'messagerie','controller'=>'users')); ?>
			</p>

			<p>
				<?php echo $this->Html->link("Relations",array('action'=>'relation','controller'=>'users')); ?>
			</p>

			<p>
				<?php echo $this->Html->link("Visites",array('action'=>'visites','controller'=>'users')); ?>
			</p>

			<p>
				<a href="/page/les-droits-d-acces-16">Droits d'accés</a>
			</p>

		</div>

	</div>

	<img src="/img/accueil_139.gif" alt="Divide Line" />

	<div class="sidebarNews participez">

		<img src="/img/accueil_78.gif" alt="sidebar news image" />

		<div class="sideNews">
			<span class="lamain"><a href="/events">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</span>
			<h3>
				<a href="/events">Participez</a>
			</h3>
			<?php 

			$link1 = $eventfront['Event1']['id'];
			$link2 = $eventfront['Event2']['id'];
			$link3 = $eventfront['Event3']['id'];

			?>
			<p>
				<a href="/events/show/<?php echo $link1 ?>">AMfineTrust</a>
			</p>

			<!--		<p><a href="/page/legal-room-19">LegalRoom</a></p>-->

			<p>
				<a href="/events/show/<?php echo $link2 ?>">User Club</a>
			</p>
			<!-- 	<p><a href="/events/show/<?php echo $link3 ?>">Business Dating</a></p> -->
			<p>
				<a href="/pages/show/50">Business Dating</a>
			</p>



		</div>

		<div style="clear: both; height: 1px;"></div>

	</div>

	<img src="/img/accueil_139.gif" alt="Divide Line" />

	<p class="inviter">
		<?php echo $this->Html->link("Inviter des relations",array('action'=>'contact','controller'=>'Relations')); ?>
		<img src="/img/accueil_12.gif" alt="Inviter des relations" />
	</p>

	<div class="picright">
		<?php if (isset($me) && (!empty($me)) && ($sondageactif == 1)  && ($participer == 0)): ?>
		<LINK rel="stylesheet" type="text/css" href="/css/sond.css">

		<?php echo $this->Form->create('Sondage',array('action'=>'vote')) ?>
		<div class="rmi">
			<p class="sondage">
				<u>Sondage</u>
			</p>
			<p class="question">
				<?php echo $sondage['Sondage']['question'] ?>
			</p>
			<p class="rr1">
				<input class="inrad" style="width: 16px;" checked="checked"
					type="radio" name="data[Infonews][r]" value="1">
				<?php echo $sondage['Sondage']['r1'] ?>
			</p>
			<p class="rr2">
				<input class="inrad" style="width: 16px;" type="radio"
					name="data[Infonews][r]" value="2">
				<?php echo $sondage['Sondage']['r2'] ?>
			</p>
			<?php if (!empty($sondage['Sondage']['r3'])): ?>
			<p class="rr3">
				<input class="inrad" style="width: 16px;" type="radio"
					name="data[Infonews][r]" value="3">
				<?php echo $sondage['Sondage']['r3'] ?>
			</p>
			<?php endif ?>
			<?php if (!empty($sondage['Sondage']['r4'])): ?>
			<p class="rr4">
				<input class="inrad" style="width: 16px;" type="radio"
					name="data[Infonews][r]" value="4">
				<?php echo $sondage['Sondage']['r4'] ?>
			</p>
			<?php endif ?>
			<?php if (!empty($sondage['Sondage']['r5'])): ?>
			<p class="rr5">
				<input class="inrad" style="width: 16px;" type="radio"
					name="data[Infonews][r]" value="5">
				<?php echo $sondage['Sondage']['r5'] ?>
			</p>
			<?php endif ?>
			<?php if (!empty($sondage['Sondage']['r6'])): ?>
			<p class="rr6">
				<input class="inrad" style="width: 16px;" type="radio"
					name="data[Infonews][r]" value="6">
				<?php echo $sondage['Sondage']['r6'] ?>
			</p>
			<?php endif ?>

			<p>
				<textarea name="remarquer" class="txtvote" id="" cols="30" rows="10">Remarque</textarea>
			</p>

			<p>
				<button class="voterbtn"
					style="float: right; background: url(/img/log_in_14.gif) repeat-x; color: white; border-top: 1px solid #F0B7BB; border-right: 1px solid #862E33; border-bottom: 1px solid #380404; border-left: 1px solid #BE7074; height: 16px; margin-right: 27px; margin-top: 2px; font-size: 11px; cursor: pointer;">Voter</button>
			</p>
		</div>


		<?php echo $this->Form->end() ?>

		<?php endif ?>
		<img src="/img/accueil_95.gif" alt="pic" />

	</div>



	<?php $this->requestAction('/ads/showfooter/1') ?>
	<div class="sidebarNews">

		<img src="/img/accueil_100.gif" alt="sidebar news image" />

		<div class="sideNews participez2">

			<h3>À la une</h3>
			<?php foreach ($leftp as $k => $v): ?>
			<p>
				<?php echo $this->Formattext->formattext($v['Page']['name'],150) ?>
				<br />

				<?php echo $this->Html->link("lire la suite",array('action'=>'show','controller'=>'pages',$v['Page']['id'])); ?>

			</p>
			<?php endforeach ?>

			<?php foreach ($leftf as $k => $v): ?>
			<p>
				<?php echo $this->Formattext->formattext($v['Forumsujet']['sujet'],150) ?>
				<br />

				<?php echo $this->Html->link("lire la suite",array('action'=>'show','controller'=>'forums',$v['Forumsujet']['id'])); ?>

			</p>
			<?php endforeach ?>


		</div>

	</div>

	<div style="clear: both; height: 1px;"></div>

	<div class="badge">

		<a href="/users/badges">Télécharger votre badge</a>

	</div>

</div>
