<div class="p5x">
<?php echo $this->Html->css('css/visites');     ?>
<?php $this->set('title_for_layout',"AmfineXchange | Visites"); ?>

<?php echo $this->element('left') ?>

<LINK
	rel="stylesheet" type="text/css" href="/css/act.css">

<div id="mainRight">
	<?php echo $this->element('topprofil') ?>
	<?php echo $this->element('actionblock') ?>
	<br /> <br /> <br />






	<br />
	<div class="counting">
		Nombre de visites de mon profil :
		<?php echo $counting ?>
	</div>
	<?php foreach ($visites as $k => $v): ?>

	<div class="news">
		<div>
			<table
				style="width: 447px; margin-bottom: 17px; margin-left: 90px; margin-left: 117px;">
				<tr>
					<td class="td1" rowspan="3"><a
						href="/users/show/<?php echo $v['User']['id'] ?>"> <img
							src="/image.php?width=47&amp;image=<?php echo $v['User']['photo'] ?>"
							alt="" style="margin-right: 10px;" />


					</a>
					</td>
					<td class="td2"><b><b><a
								href="/users/profilvoir/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
							</a> </b> </b></td>
					<td class="td3"><a
						href="/users/messagerieenvoyer/<?php echo $v['User']['id'] ?>">envoyer
							un message</a></td>
				</tr>
				<tr>

					<td class="td4"><?php if(!empty($v['User']['fonction'])){
						echo $v['User']['fonction'].', ';
					} ?> <?php if(!empty($v['User']['societe'])){
						echo $v['User']['societe'].', ';
					} ?> <?php if(!empty($v['User']['ville'])){
						echo $v['User']['ville'].', ';
					} ?> <?php if(!empty($v['User']['pays'])){
						echo $v['User']['pays'].'';
					} ?>
					</td>
					<td class="td5"><a
						href="/users/membres/?byid=<?php echo $v['User']['id'] ?>">voir
							ses <?php echo $v['User']['relcount'] ?> contact(s)
					</a></td>
				</tr>
				<tr>
					<td><?php echo $v['Activity']['additionnal2'] ?> visites. Dernière
						visite <?php echo $this->Formattext->date_fran2(strtotime($v['Activity']['updated'])) ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php endforeach ?>



	<div class="newsNavigation">


		<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

		<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
		<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

	</div>



</div>

</div>