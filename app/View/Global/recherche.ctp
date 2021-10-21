<div class="search">

<?php $this->set('title_for_layout',"AmfineXchange | Recherche Avancée"); ?>
<div class="page-header">Recherche avancée</div>
<h1>
	<?php echo count($pages)+count($forums)+count($users)+count($events) ?>
	resultats pour :
	<?php echo $search ?>
</h1>

<div class="actions">

	<button id="last1" type="button"
		class="btn <?php echo count($pages)?"primary":"" ?> t1"
		style="margin-left: -123px;">
		Articles & Vidéos (
		<?php echo count($pages) ?>
		)
	</button>
	<button id="last2" type="button"
		class="btn <?php echo count($forums)?"primary":"" ?>">
		Discussions (
		<?php echo count($forums) ?>
		)
	</button>
	<button id="last3" type="button"
		class="btn <?php echo count($users)?"primary":"" ?>">
		Membres (
		<?php echo count($users) ?>
		)
	</button>
	<button id="last4" type="button"
		class="btn <?php echo count($events)?"primary":"" ?>">
		Evènements (
		<?php echo count($events) ?>
		)
	</button>


</div>
<div class="pages">
	<?php foreach ($pages as $key => $v): ?>

	<div class="actions">
		<div class="sub">
			<h2>
				<?php echo $this->Html->link($v['Page']['name'],array('action'=>'show','controller'=>'pages',$v['Page']['id'])); ?>
				</h1>
				<h3>
					<?php echo $this->Formattext->date_fran($v['Page']['created']) ?>
					,
					<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
			
			</h2>
			<h3>
				<?php echo $this->Formattext->formattext($v['Page']['content']); ?>
				</h2>
		
		</div>
	</div>
	<?php endforeach ?>
</div>


<div class="forums">
	<?php foreach ($forums as $key => $v): ?>
	<?php if (isset($v['Forumsujet']) && !empty($v['Forumsujet'])): ?>
	<div class="actions">
		<div class="sub">
			<h2>
				<?php echo $this->Html->link($v['Forumsujet']['sujet'],array('action'=>'show','controller'=>'forums',$v['Forumsujet']['id'])); ?>
				</h1>
				<h3>
					<?php echo $this->Formattext->date_fran($v['Forumsujet']['created']) ?>
					,
					<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
			
			</h2>
			<h3>
				<?php echo $this->Formattext->formattext($v['Forumsujet']['message']); ?>
				</h2>
		
		</div>
		<?php else: ?>
		<div class="actions">
			<div class="sub">
				<h2>
					<?php echo $this->Html->link($v['Forum']['sujet'],array('action'=>'show','controller'=>'forums',$v['Forumsujet']['id'])); ?>
					</h1>
					<h3>
						<?php echo $this->Formattext->date_fran($v['Forum']['created']) ?>
						,
						<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
				
				</h2>
				<h3>
					<?php echo $this->Formattext->formattext($v['Forum']['content']); ?>
					</h2>
			
			</div>
			<?php endif ?>

		</div>
		<?php endforeach ?>
	</div>

	<div class="users">
		<?php foreach ($users as $key => $v): ?>
		<div class="news">

			<a href="/users/profilshow/<?php echo $v['User']['id'] ?>"><img
				src="<?php echo $v['User']['photo'] ?>"
				alt="<?php echo '/img/'.$v['User']['username'] ?>"
				style="width: 47px; height: 47px;" /> </a>

			<div>
				<p>
					<?php echo $v['User']['firstname'] ?>
					<?php echo $v['User']['lastname'] ?>
				</p>

			</div>

		</div>

		<?php endforeach ?>
	</div>


	<div class="events">
		<?php foreach ($events as $key => $v): ?>

		<div class="actions">
			<div class="sub">
				<h2>
					<b><a href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $v['Event']['theme'] ?>
					</a> </b>
				</h2>
				<h2>
					<?php echo $this->Formattext->formattext($v['Event']['presentation']); ?>
				</h2>
				<h2>
					<?php echo $this->Formattext->formattext($v['Event']['programme']); ?>
				</h2>
			</div>
		</div>
		<?php endforeach ?>
	</div>
</div>


</div>