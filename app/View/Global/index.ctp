<?php $this->set('title_for_layout',"AmfineXchange | Accueil"); ?>

<?php echo $this->element('partage') ?>



<div class="blocky blocky2">
	<?php foreach ($news as $k => $v): ?>
	<?php if ($k == 4): ?>
	<?php break; ?>
	<?php endif ?>


	<div id="titre<?php echo $k ?>" class="titre<?php echo $k ?>" <?php if ($k != 0): ?>
	<?php echo ' style="display:none;" ' ?> <?php endif ?>>
		<div class="imagetop"
			style="margin-left: 1px; position: absolute; height: 127px; max-height: 127px; width: 383px;">
			<a href="/pages/show/<?php echo $v['Page']['id'] ?>"><img
				style="margin-left: 1px; position: absolute; height: 127px; max-height: 127px; width: 383px;"
				src="<?php echo '/img/'.$v['Page']['miniature'] ?>"
				alt="<?php echo '/img/'.$v['Page']['id'] ?>"
				/> </a>
		</div>
		<div class="titreText">

			<p id="slid_titre<?php echo $k ?>" style="padding-left: 7px; color: #404040;">
				<?php echo $this->Formattext->formattext($v['Page']['name'],25) ?>
				<br />
			</p>

			<p id="slid_signets<?php echo $k ?>" style="padding-left: 7px; color: #7a7a7a;">
				<?php echo $this->Formattext->formattext($v['Page']['content'],140) ?>
			</p>

			<p class="navButtons">

				<a class="but1 activeButton" href="#">1</a> <a class="but2" href="#">2</a>

				<a class="but3" href="#">3</a> <a class="but4" href="#">4</a>

			</p>

		</div>

		<div style="clear: both; height: 1px;"></div>

	</div>

	<?php endforeach ?>
</div>


<?php
if(!isset($this->request->params['pass']['0'])){
	$this->request->params['pass']['0'] =0;
}

?>

<div class="choix">
	<ul class="pills" style="margin-left: -113px;">

		<li class="c1 active"><a
			style="background-color: #bdbdbd; color: white;"
			href="/global/index/0">TOUT</a></li>
		<li class="c2 active"><a
			style="background-color: #1660f5; color: white;"
			href="/global/index/1">METIER</a></li>
		<li class="c3 active"><a
			style="background-color: #cf1338; color: white;"
			href="/global/index/2">PARTIS PRIS</a></li>
		<li class="c4 active"><a
			style="background-color: #ac12ba; color: white;"
			href="/global/index/3">MARCHE</a></li>

	</ul>
</div>

<?php 
$coloring[0] ="#707070";
$coloring[1] ="#1660f5";
$coloring[2] ="#cf1338";
$coloring[3] ="#ac12ba";
switch ($this->request->params['pass']['0']) {
	case '0':
		echo '<h1 style="    font-size: 22px;">A LA UNE</h1>';
		$color = "#707070";
		break;
	case '1':
		echo '<h1 style="    font-size: 22px;">METIER</h1>';
		$color = "#1660f5";
		break;
	case '2':
		echo '<h1 style="    font-size: 22px;">PARTIS PRIS</h1>';
		$color = "#cf1338";
		break;
	case '3':
		echo '<h1 style="    font-size: 22px;">MARCHE</h1>';
		$color = "#ac12ba";
		break;

	default:
		echo "<h1>A LA UNE</h1>";
	$color = "#707070";
	break;
} ?>


<div class="blocktop">
	<?php foreach ($news as $k => $v): ?>
	<div class="news" style="margin-bottom: 16px; margin-bottom: 38px;">

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
		} ?>
		<a href="/pages/show/<?php echo $v['Page']['id'] ?>"><img
			src="<?php echo $v['Page']['miniature'] ?>"
			alt="<?php echo $v['Page']['id'] ?>"
			style="width: 47px; height: 47px;" /> </a><span class="imgg" style="background-color:<?php echo $color ?>"></span>


		<div>


			<h2 class="ppp3" style="color: #707070">
				<?php echo $this->Html->link($v['Page']['name'],array('action'=>'show','controller'=>'pages',$v['Page']['id'])); ?>
			</h2>
			<p class="ppp3" style="font-style: italic;">

				<?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>
				, posté par
				<?php echo $v['User']['firstname'] ?>
				<?php echo $v['User']['lastname'] ?>
				,
				<?php echo count($v['Comment']) ?>
				commentaire
				<?php if(count($v['Comment'])>1) echo 's' ?>
				<br />
			</p>
			<p class="ppp3">
				<?php echo $this->Formattext->formattext($v['Page']['content'],150) ?>

			</p>

		</div>

	</div>
	<?php endforeach ?>
</div>






<div class="newsNavigation">


	<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

	<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
	<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

</div>

