
<?php $this->set('title_for_layout',"AmfineXchange | Bestpractices"); ?>
<LINK
	rel="stylesheet" type="text/css" href="/css/best.css">
<div id="mainRight">
	<?php echo $this->element('partager3'); ?>




	<div class="well">
		<h1>
			Etude de cas
			<button class="btn primary"
				onClick="window.location.href='/global/addbes'"
				style="float: right; margin-top: -11px; margin-right: -15px;">Proposer
				un article, une vidéo</button>
		</h1>

		<?php foreach ($pages as $k => $v): ?>
		<?php 
		if(!empty($v['Page']['miniature2'])){
			$v['Page']['miniature']=$v['Page']['miniature2'];
		}else{
			$v['Page']['miniature']='/img/'.$v['Page']['miniature'];
		}
		?>

		<table>
			<tr>
				<td class="td1 tdspe" rowspan="3" style="width: 60px;"><a
					href="/pages/show/<?php echo $v['Page']['id'] ?>"><img
						src="<?php echo $v['Page']['miniature'] ?>"
						alt="<?php echo '/img/'.$v['Page']['id'] ?>"
						style="width: 47px; height: 47px;" /> </a></td>
				<td class="td1"><a href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $this->Formattext->formattext($v['Page']['name'],60) ?>
				</a><br /></td>
			</tr>

			<tr>
				<td class="td1"><?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>,
					posté par <?php echo $v['User']['firstname'] ?> <?php echo $v['User']['lastname'] ?>,
					<?php echo count($v['Comment']) ?> commentaire<?php if(count($v['Comment'])>1) echo 's' ?>
				</td>
			</tr>
			<tr>
				<td class="td1"><?php echo $this->Formattext->formattext($v['Page']['content'],140) ?>
				</td>
			</tr>


		</table>

		<?php endforeach ?>


		<div class="newsNavigation">


			<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

			<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
			<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

		</div>

	</div>

	<div class="well">
		<button style="margin-left: 177px; margin-top: 0;float:center;" type="button"
			onClick="window.location.href='/forums/index/bestpractices'"
		 class="btn primary">ACCEDEZ AUX DISCUSSIONS</button>
	</div>

	<!--
			<table id="dbltable" style="   margin-left: 72px;
    width: 629px;">
				<tr>
					<td class="haut" style="text-decoration: underline; border-top-width: 0;"><b>Am fine, Le référent</b></td>
					<td class="haut"  style="text-decoration: underline; border-top-width: 0;"><b>Le marché de l’édition financière</b></td>
				</tr>
				<tr>
					<td style=" border-top-width: 0;" class="bas">L’expertise métier</td>
					<td style=" border-top-width: 0;"  class="bas">L’offre</td>
				</tr>
				<tr>
					<td style=" border-top-width: 0;" >Une solution aboutie</td>
					<td style=" border-top-width: 0;" >Les régulateurs</td>
				</tr>
				<tr>
					<td style=" border-top-width: 0;" >Le sur-mesure</td>
					<td style=" border-top-width: 0;" >Les documents</td>
				</tr>
			</table>
-->
	<div class="well">

		<h1>
			FAQ
			<button class="btn primary" style="float: right;" type="button"
				onClick="window.location.href='/contacts'">Demande de rajout de FAQ</button>
		</h1>
		<?php $this->requestAction('/pages/showfooter/49') ?>



	</div>

</div>




