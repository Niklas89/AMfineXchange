<style type="text/css" media="screen">
<?php if ($_GET['display_legal'] != 1): ?>







ul#menu li {
	width: 125px;
}

ul#menu {
	width: 755px;
}



<?php if  ($_GET['membership']  == "Membre invité "):  ?>

ul#menu li
{
	width: 150px;
}

ul#menu li.last 
{
	width: 151px;
}

<?php endif; ?>



<?php if  (($_GET['action']  == "relation") || ($_GET['action']  == "visites")):  ?>

ul#menu li {
    width: 107px;
}

ul#menu {
	width: 755px;
}

<?php endif; ?>






<?php endif ?>
</style>