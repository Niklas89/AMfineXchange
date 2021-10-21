
<?php $this->set('title_for_layout',"AmfineXchange | Activitées"); ?>

<?php echo $this->element('left') ?>
<LINK
	rel="stylesheet" type="text/css" href="/css/act.css">


<div id="mainRight" class="activi">
	<?php echo $this->element('topprofil') ?>

	<?php echo $this->element('actionblock') ?>
	<br /> <br /> <br />

	<br />


	<?php foreach ($acts as $k => $v): ?>
	<div class="news">
		<div>
			<table style="width: 447px;">
				<tr>
					<td class="td1" rowspan="2"><img
						src="/image.php?width=47&amp;image=<?php echo $v['User']['photo'] ?>"
						alt=""
						style="margin-right: 10px; margin-left: 9px; margin-top: 3px; margin-bottom: 1px;" />
					</td>
					<td rowspan="2" class="td3"><?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
						<?php switch ($v['Activity']['type']) {
							case 'discussion':
								echo "a participé à une discussion";
								break;

							case 'eventcom':
								echo "a commenté un évènement";
								break;

							case 'pagecom':
								echo "a commenté une page";
								break;

							case 'participe':
								echo "participera à un évènement";
								break;

						} ?>
					</td>
					<td class="td5"><?php echo $this->Formattext->date_fran2(strtotime($v['Activity']['created'])); ?>
					</td>
				</tr>
				<tr>
					<td class="td4"><?php switch ($v['Activity']['type']) {
						case 'discussion':
							echo '<a href="/forums/show/'.$v['Activity']['additionnal'].'">Voir la discussion</a>';
							break;

						case 'eventcom':
							echo '<a href="/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
							break;

						case 'pagecom':
							echo '<a href="/pages/show/'.$v['Activity']['additionnal'].'">Voir la page</a>';
							break;

						case 'participe':
							echo '<a href="/events/show/'.$v['Activity']['additionnal'].'">Voir l\'évènement</a>';
							break;

					} ?>
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
