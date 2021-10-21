<div class="topmenu">


<div id="header">
	<?php if (!empty($etats)): ?>
	<div class="slid2" style="margin-top: 41px; width: 500px;">
		<ul id="ticker02">
			<?php foreach ($etats as $k => $v): ?>
			<li><span><?php echo $v['Contact']['firstname']." ".$v['Contact']['lastname'] ?>
			</span><a style="color: #2d70f7;" href="#"><?php echo $this->Formattext->formattext($v['Contact']['partage']) ?>
			</a></li>
			<?php endforeach ?>
		</ul>
	</div>
	<?php endif ?>

	<p>

		<span class="fineSoft">AM fineXchange, Communaut&#233;</span> <span
			class="fineXchange"><a href="http://amfinesoft.com/">AM finesoft.com</a>
		</span> <span class="language"><a href="#" class="activeLanguage">FR</a>
		</span>

	</p>
	<p class="bonjour2" style="text-align: right; font-weight: bold;">
		<?php if (isset($me['User']['id'])): ?>
		Bonjour
		<?php echo $me['User']['firstname']  ?>
		<?php echo $me['User']['lastname'] ?>
		<?php endif ?>
	</p>
	<div id="connection" style="  height: 50px;">



	

			<?php if(!AuthComponent::user('id')): ?>



			<form action="/users/login" id="UserIndexForm" method="post" ><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>



			<label>Email</label> 
			<input type="text"	name="data[User][email]" id="email" />
			<label>Mot de passe</label>
			<input	type="password" name="data[User][password]" id="password" />

			<button type="submit" id="submit">OK</button>

			<button type="button" id="insc"
				onclick='window.location.href="/users/signup";'>S'inscrire</button>

			<?php echo $this->Form->end() ?>



			<?php endif; ?>


			<?php if(AuthComponent::user('id')): ?>
		
		
		<p class="butdeco">
			<!--<a href="/users/logout"><img				style="height: 26px; position: absolute; float: right; margin-top: -6px; height: 42px; margin-left: 0; height: 23px;"	src="/img/deconnexion.jpg" alt="deco"> </a>-->

				<button class="btn primary" style="   margin-top: -38px;
     margin-left: 655px;" type="button" onClick="document.location.href='/users/logout'" >Déconnexion</button>
		</p>
		<?php endif; ?>

		<div class="topbot" style="margin-top: 14px;"></div>


		<p class="inviter1" style="  margin-top: 18px;"> 
			<a href="/relations/contact">Inviter des relations<img
				src="/img/accueil_12.gif" alt="Inviter des relations" />
			</a>
		</p>

	</div>

	<div style="clear: both; height: 1px;"></div>

	<h1>
		<a href="/">AM fineXchange</a>
	</h1>
	<div class="logo">
		<a class="logo2" href="/"></a>
	</div>
	<h2>Get &amp; Share on Financial Editing Matters</h2>

	<div style="clear: both; height: 1px;"></div>

	<p class="kidReporting">

		<span class="kid"><a href="/">Kiid &amp; Prospectus</a> </span> <span
			class="reporting"><a href="/">Reporting</a> </span> <span
			class="donate"><a href="/">Donn&#233;es &amp; moteur de calcul</a> </span>

	</p>



<?php 
$dol="not";
if(isset( $me[ 'User '][ 'membership '])){
	$dol =  $me[ 'User '][ 'membership '];
} ?>

<link rel="stylesheet" type="text/css" media="screen" href="/css/css.php?action=<?php echo $this->request->params['action'] ?>&amp;membership=<?php echo $dol ?>&amp;display_legal=<?php echo $display_legal ?>">

	<ul id="menu">

		<li
		<?php if (($this->request->params['controller'] == "global") && ($this->request->params['action'] == "index"))   echo 'class="active" ' ?>><a
			href="/">Accueil</a>
		</li>


		<?php if ($display_legal == 1): ?>
		<li
		<?php if($_SERVER['REQUEST_URI'] == "/page/legal-room-19") echo 'class="active" '; ?>><a
			href="/page/legal-room-19">LegalRoom</a></li>


		<?php endif ?>




		<li
		<?php if (($this->request->params['controller'] == "global") && ($this->request->params['action'] == "bestpractices"))   echo 'class="active" '	 ?>><a
			href="/global/bestpractices">Best Practices</a></li>

		<li
		<?php if (($this->request->params['controller'] == "forums"))  echo 'class="active" '	 ?>><a
			href="/forums/index">Discussions</a></li>

		<li><a href="#" data-placement="above" 
			title='Prochainement' id="tips">L'observatoire</a></li>

		<!--
		<li
		<?php if (($this->request->params['controller'] == "users") && ($this->request->params['action'] == "membres"))   echo ' class="active" '	 ?>
		-->
		<?php if ($me['User']['membership'] != "Membre invité"): ?>
		<li<?php if (($this->request->params['controller'] == "users") && ($this->request->params['action'] != "membres"))   echo ' class="active" '	 ?>><a
			href="/users/membres">Communaut&#233;</a></li>
		<?php endif ?>




		<li
			class="last <?php if($_SERVER['REQUEST_URI'] == "/page/userclub-20") echo ' active '; ?>"
			<?php if ($display_legal == 0): ?> style="width: 125px;"
			<?php endif; ?>><a href="/page/userclub-20">USER CLUB</a></li>

	</ul>


	<?php if (!empty($eventslid)): ?>
	<div class="slid">
		<ul id="ticker01">

			<?php foreach ($eventslid as $k => $v): ?>
			<li><span><?php echo $this->Formattext->date_fran2(strtotime($v['Event']['date'])); ?>
			</span><a href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $this->Formattext->formattext($v['Event']['theme'],100) ?>
			</a></li>
			<?php endforeach ?>
		</ul>
	</div>



	<?php endif ?>

</div>


</div>