<?php $this->set('title_for_layout', 'Discussions'); ?>	
<div data-role="header" data-theme="a">
	<h1>Discussions</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
	<div data-role="content" data-theme="d">
		<?php foreach ($cats as $k => $v): ?>
		<div class="well">
			<h2>
				<?php echo $v['Forumcat']['categorie'] ?>
			</h2>
			<ul data-role="listview" data-inset="true">
				<?php foreach ($v['Forumsujet'] as $k2 => $v2): ?>
				<li>
					<a href="discussions_show/<?php echo $v2['id'] ?>">
						<img src="/img/<?php echo $v2['miniature'] ?>" alt="" style="width: 80px; height: 80px;" />
						<h3><?php echo $v2['sujet'] ?></h3>
						<p>
							<?php echo $this->Formattext->date_fran2(strtotime($v2['created'])) ?>,
							<?php echo $v2['User']['firstname']." ".$v2['User']['lastname'] ?>,
							<?php echo count($v2['Forum']) ?> réponse<?php if(count($v2['Forum'])>1) echo 's' ?>
						</p>
						<p>
							<?php echo $this->Formattext->formattext($v2['message'],150) ?>
						</p>
					</a>	
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endforeach ?>
	</div>
	
<?php echo $this->element('footer_mobile'); ?>