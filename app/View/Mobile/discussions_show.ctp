<?php $this->set('title_for_layout',"AmfineXchange | ".$topic['Forumsujet']['sujet']); ?>
<div data-role="header" data-theme="a">
		<h1>Discussions</h1>
		<?php echo $this->Html->link("Message",
								array('controller'=>'mobile','action'=>'index'),
								array('class'=>'header ui-btn-right','data-icon'=>'custom', 'rel'=>'external', 					'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
					    ));
		?>
	</div><!-- /header -->
	
	<div data-role="content" data-theme="d">


		<div id="mainRight">
			<?php echo $this->element('partager3'); ?>
			<?php $rep = 0; ?>
			<?php foreach ($forums as $k => $v2): $v2 = current($v2)?>
			<?php $rep++; ?>
			<?php endforeach ?>
			<div class="page-header topsujet">
				<h1>
					<?php echo $topic['Forumsujet']['sujet']; ?>
				</h1>
				<p class="counting">
					Ouverte par
					<?php echo $topic['User']['firstname'].' '.$topic['User']['lastname'] ?>
					-
					<?php echo $rep ?>
					réponse
					<?php if($rep>1) echo 's'
					?>
				</p>
				<p class="topsujet2">
					<?php echo $topic['Forumsujet']['message']; ?>
				</p>
				<button class="btn primary" style="" type="button"
					onClick="window.location.href='/forums/addrep/<?php echo $topic['Forumsujet']['id'] ?>'">Répondre</button>
			</div>



			<?php foreach ($forums as $k => $v2):?>

			<div class="well">

				<h1>
					<?php echo $v2['Forum']['sujet'] ?>


					<span class="naming"><?php echo $this->Formattext->date_fran2(strtotime($v2['Forum']['created'])) ?>
						à <?php echo date('H:i',strtotime($v2['Forum']['created'])); ?>, <a
						href="/users/profilvoir/<?php echo $v2['Forum']['user_id'] ?>"><?php echo $v2['Forum']['naming'] ?>
					</a> <?php if (isset($me) && ($me['User']['id'] == $v2['Forum']['user_id'])): ?>
						<a style="" href="/forums/addrep2/<?php echo $v2['Forum']['id'] ?> ">(Modifier
							mon message)</a> <?php endif ?> </span>
				</h1>
				<div class="picim">
					<a href="/pages/show/<?php echo $v2['Forum']['user_id'] ?>"><img
						src="<?php echo $v2['Forum']['namingm'] ?>" alt=""
						style="width: 47px; height: 47px;" /> </a>
				</div>
				<div class="contentmess">
					<?php echo $v2['Forum']['content'] ?>
				</div>

			</div>
			<?php endforeach ?>



		</div>

		<div class="newsNavigation">


			<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

			<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
			<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

		</div>
<?php echo $this->element('footer_mobile'); ?>