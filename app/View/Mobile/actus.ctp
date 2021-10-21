<?php $this->set('title_for_layout', 'Actus'); ?>	
<div data-role="header" data-theme="a">
	<h1>Actus</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
	<div data-role="content" data-theme="d">
		<ul data-role="listview" data-inset="true">
	<?php foreach ($news as $k => $v): ?>
	<?php 
	if(!empty($v['Page']['miniature2'])){
		$v['Page']['miniature']=$v['Page']['miniature2'];
	}else{
		$v['Page']['miniature']='/img/'.$v['Page']['miniature'];
	}
	?>

	<?php 
		switch ($v['Page']['affectation']) {
			case '0':

				$color = "#707070";
				break;
			case '1':

				$color = "#1660f5";
				break;
			case '2':

				$color = "#cf1338";
				break;
			case '3':

				$color = "#ac12ba";
				break;

			default:

				$color = "#707070";
			break;
		} 
	?>
		<li>
			<a href="<?php echo $this->Html->url($v['Page']['id']); ?>">
				<img src="<?php echo $v['Page']['miniature'] ?>" alt="<?php echo $v['Page']['id'] ?>" style="width: 80px; height: 80px;" />
				<h3><?php echo $v['Page']['name']; ?></h3>
				<p>
					<?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>
					, par
					<?php echo $v['User']['firstname'] ?>
					<?php echo $v['User']['lastname'] ?>
				</p>
			</a>	
		</li>		
		<?php endforeach ?>
	</ul>
</div>

<?php echo $this->element('footer_mobile'); ?>