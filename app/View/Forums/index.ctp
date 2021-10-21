<div class="foi">


<?php $this->set('title_for_layout',"AmfineXchange | Discussions"); ?>


<LINK
	rel="stylesheet" type="text/css" href="/css/forum.css">

<div id="mainRight">
	<?php echo $this->element('partager3'); ?>

	<div class="page-header">
		<h1>Discussions</h1>
	</div>
	<?php $this->requestAction('/pages/showfooter/30') ?>


	<?php foreach ($cats as $k => $v): ?>

	<div class="well">
		<h1>
			<?php echo $v['Forumcat']['categorie'] ?>
			<?php if(($v['Forumcat']['id']==7) || ($v['Forumcat']['id']==8) ): ?>

			<?php if (($v['Forumcat']['id']==7) && $legalroom == 1): ?>

			<button class="btn primary" style="float: right;" type="button"
				onClick="window.location.href='/forums/addsujet/<?php echo $v['Forumcat']['id'] ?>'">Proposer
				une discussion</button>
			<?php endif ?>
			<?php if (($v['Forumcat']['id']==8) && $userclub == 1): ?>

			<button class="btn primary" style="float: right;" type="button"
				onClick="window.location.href='/forums/addsujet/<?php echo $v['Forumcat']['id'] ?>'">Proposer
				une discussion</button>
			<?php endif ?>

			<?php else: ?>

			<button class="btn primary" style="float: right;" type="button"
				onClick="window.location.href='/forums/addsujet/<?php echo $v['Forumcat']['id'] ?>'">Proposer
				une discussion</button>
			<?php endif; ?>


		</h1>
		<table>
			<?php foreach ($v['Forumsujet'] as $k2 => $v2): ?>
			<tr style="margin-top: 10px;">
				<td class="td1" rowspan="3"><a
					href="/forums/show/<?php echo $v2['id'] ?>"><img
						src="/img/<?php echo $v2['miniature'] ?>" alt=""
						style="width: 47px; height: 47px;" /> </a></td>
				<td class="td1"><a href="/forums/show/<?php echo $v2['id'] ?>"><?php echo $v2['sujet'] ?>
				</a></td>
			</tr>
			<tr>
				<td class="td1"><?php echo $this->Formattext->date_fran2(strtotime($v2['created'])) ?>,
					<?php echo $v2['User']['firstname']." ".$v2['User']['lastname'] ?>,
					<?php echo count($v2['Forum']) ?> réponse<?php if(count($v2['Forum'])>1) echo 's' ?>
				</td>
			</tr>
			<tr>
				<td class="td1"><?php echo $this->Formattext->formattext($v2['message'],150) ?><br />
					<br /></td>
			</tr>

			<?php endforeach ?>



		</table>

	</div>
	<br> <br> <br>
	<?php endforeach ?>



</div>





</div>