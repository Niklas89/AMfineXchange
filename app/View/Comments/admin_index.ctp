<div class="page-header">

	<h1>Gérer les commentaires sur Pages</h1>

</div>
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

<table class="zebra-striped">

	<tr>
	
	
	<tr>



		<th>Page</th>

		<th>Utilisateur</th>

		<th>Contenu</th>

		<th>Date de création</th>
		<th>Actions</th>
	</tr>

	<?php foreach ($items as $k => $v):  ?>

	<tr>


		<td><?php echo $v['Page']['name'] ?></td>
		<td><?php echo $v['User']['firstname']." ".$v['User']['lastname'] ?></td>
		<td><?php echo $v['Comment']['content'] ?></td>
		<td><?php echo ($v['Comment']['created']) ?></td>
		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['Comment']['id']),null,'Voulez vous vraiment supprimer ce commentaire?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['Comment']['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>











	</tr>

</table>

<?php echo $this->Paginator->numbers(); ?>

<br>
<br>
<br>
<div class="page-header">

	<h1>Gérer les commentaires sur Evènements</h1>

</div>
<table class="zebra-striped">

	<tr>
	
	<tr>
		<th>Event</th>

		<th>Utilisateur</th>

		<th>Contenu</th>

		<th>Date de création</th>
		<th>Actions</th>
	</tr>

	<?php foreach ($items2 as $k => $v):  ?>

	<tr>


		<td><?php echo $v['Page']['baseline'] ?></td>
		<td><?php echo $v['User']['firstname']." ".$v['User']['lastname'] ?></td>
		<td><?php echo $v['Eventcomment']['content'] ?></td>
		<td><?php echo ($v['Eventcomment']['created']) ?></td>
		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete2',$v['Eventcomment']['id']),null,'Voulez vous vraiment supprimer ce commentaire?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit2',$v['Eventcomment']['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>

	</tr>

</table>

<?php echo $this->Paginator->numbers(); ?>