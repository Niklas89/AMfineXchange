<?php $this->set('title_for_layout',"Messagerie"); ?>
<div data-role="header" data-theme="a">
	<h1>Messagerie</h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">




	<div class="page-header">
		<button type="button" style="margin-top: 1px; margin-bottom: 9px;"
			onClick="window.location.href='communaute?messagerie=1';"
			class="btn primary">Nouveau Message</button>
	</div>


	<?php foreach ($messages as $k => $v): ?>
	
	<ul data-role="listview" data-inset="true">
				<li>
					<a
						href="/mobile/profilvoir/<?php echo $v['Sender']['id'] ?>"> <img
							src="/image.php?width=47&amp;image=<?php echo $v['Sender']['photo'] ?>"
							alt=""
							style="margin-right: 10px; margin-left: 9px; margin-top: 3px; margin-bottom: 1px;" />

					
					<h3><?php echo $v['Sender']['firstname'].' '.$v['Sender']['lastname'] ?></h3>
					
				
					<p>Reçu le <?php echo $this->Formattext->date_fran2(strtotime($v['Message']['created'])); ?>
					</p>
					<p><?php echo $this->Formattext->formattext($v['Message']['message'],1000) ?></p>
					
					</a>
				</li>
	</ul>

	<?php endforeach ?>






</div>
<?php echo $this->element('footer_mobile'); ?>