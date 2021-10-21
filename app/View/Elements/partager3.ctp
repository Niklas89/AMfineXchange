<div class="partag3">

<LINK
	rel="stylesheet" type="text/css" href="/css/part.css">

<?php if ($me): ?>

<img
	style="width: 44px; position: absolute; width: 44px; max-width: 44px; max-height: 44px; margin-top: 4px;"
	src="<?php echo $me['User']['photo'] ?>" alt="Person" />
<?php 

if ($me['User']['partage'] != "") {
	$partage = $me['User']['partage'];
}else {
	$partage = "Partager une nouvelle" ;
}


?>
<p class="uneNouvelle" style="margin-left: 55px;">
	<input id="newnouv" name="nouvelle" type="text"
		value="<?php echo $partage ?>" onClick="this.value=''" />
</p>

<div
	style="clear: both; height: 1px;"></div>
<?php endif ?>

<br>
<br>
<br>
<br>
<br>

</div>