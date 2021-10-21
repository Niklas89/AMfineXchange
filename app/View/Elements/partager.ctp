
<LINK
	rel="stylesheet" type="text/css" href="/css/part2.css">

<?php if ($me): ?>
<?php 

if ($me['User']['partage'] != "") {
	$partage = $me['User']['partage'];
}else {
	$partage = "Partager une nouvelle" ;
}


?>
<img
	src="/img/profil_contenu_26.gif" alt="line" id="line" />
<p class="uneNouvelle2">
	<input id="newnouv" name="nouvelle" type="text"
		value="<?php echo $partage ?>" onClick="this.value=''" />
</p>
</p>
<?php endif ?>

