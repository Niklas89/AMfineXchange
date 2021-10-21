<?php $this->set('title_for_layout',"AmfineXchange | Messagerie"); ?>

<?php echo $this->element('left') ?>
<LINK
	rel="stylesheet" type="text/css" href="/css/mess2.css">

<div id="mainRight">
	<?php echo $this->element('topprofil') ?>
	<?php echo $this->element('actionblock') ?>

	<div class="page-header">
		<button type="button" style="margin-top: 1px; margin-bottom: 9px;"
			onClick="window.location.href='/users/membres?messagerie=1';"
			class="btn primary">Nouveau Message</button>
	</div>


	<?php foreach ($messages as $k => $v): ?>
	<div class="news">
		<div>
			<table style="width: 453px; margin-left: 87px;">
				<tr>
					<td class="td1" rowspan="2"><a
						href="/users/profilvoir/<?php echo $v['Sender']['id'] ?>"> <img
							src="/image.php?width=47&amp;image=<?php echo $v['Sender']['photo'] ?>"
							alt=""
							style="margin-right: 10px; margin-left: 9px; margin-top: 3px; margin-bottom: 1px;" />

					</a></td>
					<td class="td1" colspan="2"><b><?php echo $this->Formattext->formattext($v['Message']['message'],1000) ?>
					</b></td>

				</tr>
				<tr>
					<td class="td1">Par <a
						href="/users/profilvoir/<?php echo $v['Sender']['id'] ?>"><?php echo $v['Sender']['firstname'].' '.$v['Sender']['lastname'] ?>
					</a> le <?php echo $this->Formattext->date_fran2(strtotime($v['Message']['created'])); ?>
					</td>

				</tr>
			</table>
		</div>
	</div>
	<?php endforeach ?>






	<br> <br> <br>
</div>
