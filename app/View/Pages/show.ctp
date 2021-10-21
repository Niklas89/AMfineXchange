<div class="show">
<?php   function date_fran()
{
	$mois = array("Janvier", "Fevrier", "Mars",
			"Avril","Mai", "Juin",
			"Juillet", "Août","Septembre",
			"Octobre", "Novembre", "Decembre");
	$jours= array("Dimanche", "Lundi", "Mardi",
			"Mercredi", "Jeudi", "Vendredi",
			"Samedi");
	return $jours[date("w")]." ".date("j").(date("j")==1 ? "er":" ").
	$mois[date("n")-1]." ".date("Y");
} ?>
<?php $this->set('title_for_layout','AmfineXchange | '.strip_tags($page['Page']['name'])); ?>

<?php if ($page['Page']['id'] == 20): ?>

<LINK
	rel="stylesheet" type="text/css" href="/css/userclub.css">
<?php endif ?>

<div class="page-header">

	<?php 

	switch ($page['Page']['affectation']) {
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

	<h1 class="h1" style="color:<?php echo $color; ?>;font-size: 15px;<?php if ($page['Page']['id'] == 36): ?> font-size: 17px; <?php endif ?>">
		<span><?php echo $page['Page']['name'] ?> </span>
	</h1>
	<h2>
		Posté par « 
		<?php echo $page['User']['firstname']." ".$page['User']['lastname'] ?>
		 », le
		<?php echo date_fran($page['Page']['created']); ?>
		<?php if ($page['Page']['type'] != "footer" && $page['Page']['type'] != "normalsanscomment"): ?>
		,
		<?php echo count($page['Comment']) ?>
		commentaires
		<?php endif ?>

	</h2>
	<?php if ($page['Page']['type'] == "compterendu"): ?>
	<button class="btn primary compter" type="button"
		onClick="window.location.href='/events/show/<?php echo $idc ?>'">Présentation
		de l'évènement</button>
	<?php endif ?>
</div>

<div class="contenu">
	<p>
		<?php echo $page['Page']['content']; ?>
	</p>


	<?php if ($page['Page']['id'] == 19): ?>
	<LINK rel="stylesheet" type="text/css" href="/css/best.css">
	<button class="btn primary" style="    position: absolute;
    margin-top: 35px;" type="button"
		onClick="window.location.href='/forums/index/legalroom'">Accédez aux
		discussions Legal Room</button>



	<div class="well">
		<h1>Calendrier réglementaire</h1>

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
				<td class="td1"><a href="/pages/show/<?php echo $v['Page']['id'] ?>"><strong><?php echo $this->Formattext->formattext($v['Page']['name'],80) ?>
					</strong> </a></td>
			</tr>

			<tr>
				<td class="td1"><?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>,
					posté par <?php echo $v['User']['firstname'] ?> <?php echo $v['User']['lastname'] ?>
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
		<h1>La « Loi », les documents</h1>

		<?php foreach ($pages2 as $k => $v): ?>
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
				<td class="td1"><a href="/pages/show/<?php echo $v['Page']['id'] ?>"><strong><?php echo $this->Formattext->formattext($v['Page']['name'],80) ?>
					</strong> </a></td>
			</tr>

			<tr>
				<td class="td1"><?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>,
					posté par <?php echo $v['User']['firstname'] ?> <?php echo $v['User']['lastname'] ?>
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

	<?php endif ?>



</div>
<?php if ($admin == 1): ?>
<div
	class="social">


	<!-- Start Shareaholic Sexybookmark HTML-->

	<div class="shr_class shareaholic-show-on-load"></div>

	<!-- End Shareaholic Sexybookmark HTML -->
	<!-- Start Shareaholic Sexybookmark script -->

	<script type="text/javascript">
var SHRSB_Settings = {"shr_class":{"src":"{Place_Path_Here}","link":"","service":"7,92,88","apikey":"6ffe2cbf142c45bd4cd03b01ec46b8658","localize":true,"shortener":"google","shortener_key":"","designer_toolTips":true,"twitter_template":"${title} - ${short_link} via @Shareaholic"}};
</script>

	<script type="text/javascript">
(function() {
var sb = document.createElement("script"); sb.type = "text/javascript";sb.async = true;
sb.src = ("https:" == document.location.protocol ? "https://dtym7iokkjlif.cloudfront.net" : "http://cdn.shareaholic.com") + "/media/js/jquery.shareaholic-publishers-sb.min.js";
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(sb, s);
})();
</script>
	<!-- End Shareaholic Sexybookmark script -->



</div>
<?php endif ?>


<?php if ($page['Page']['type'] != "footer" && $page['Page']['type'] != "normalsanscomment"): ?>


<div class="commentaire">
	<div class="page-header">
		<div class="br">
			<br /> <br /> <br />
		</div>
		<h1>
			<?php echo count($page['Comment']) ?>
			réaction
			<?php if( count($page['Comment'])>1) echo "s" ?>
			à cet article
			<button type="button" class="btn primary"
				style="margin-top: -7px; margin-bottom: -1px;"
				onClick="window.location.href='/pages/addcomment/<?php echo $page['Page']['id'] ?>'">Ecrire
				un commentaire</button>
		</h1>
	</div>

	<?php foreach ($comments as $k => $v): ?>

	<div class="news">

		<img src="<?php echo $v['User']['photo'] ?>" alt=""
			style="width: 47px; height: 47px;" />

		<div>

			<h2>
				Par
				<?php echo $v['User']['firstname']." ".$v['User']['lastname'] ?>
				le
				<?php echo $this->Formattext->date_fran2(strtotime($v['Comment']['created'])) ?>
				à
				<?php echo date('H:i:s',strtotime($v['Comment']['created'])) ?>
			</h2>

			<p>

				<?php echo $v['Comment']['content'] ?>


			</p>

		</div>

	</div>
	<?php endforeach ?>



	<!--
			<div class="ajouter">
				<button class="btn primary" type="button" onClick="window.location.href='/pages/addcomment/<?php echo $page['Page']['id'] ?>'">Ajouter un commentaire</button>
			</div>
-->

</div>

<?php endif ?>
</div>