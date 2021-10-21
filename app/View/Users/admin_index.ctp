<div class="page-header">

	<h1>Gérer les utilisateurs</h1>

</div>

<!--
<p><?php echo $this->Html->link("Ajouter un utilisateur",array('action'=>'edit'),array('class'=>'btn primary')); ?></p>
-->
<p>
	<?php echo $this->Html->link("Export complet XLS",array('action'=>'xlsusers'),array('class'=>'btn primary')); ?>
</p>
<p>
	<?php echo $this->Html->link("Export filtré XLS",array('action'=>'xlsusersfilter'),array('class'=>'btn primary')); ?>
</p>
<br>
<H3>
	Total:
	<?php echo $count ?>
	utilisateurs
</H3>
<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Email</th>

		<th>Société</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Type de compte</th>
		<th>Date d'inscription</th>

		<th>Actif</th>

		<th>Action</th>

	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['email'] ?></td>

		<td><?php echo $v['societe'] ?></td>

		<td><?php echo $v['lastname'] ?></td>

		<td><?php echo $v['firstname'] ?></td>
		<td><?php echo $v['membership'] ?></td>

		<td><?php echo $this->Formattext->date_fran2($v['created']) ?> <?php echo date('H:i:s',$v['created']) ?>
		</td>


		<td><?php echo $v['active']=='1'?'<span class="label3 success">Activé</span>':'<span class="label3 important">Non activé</span>' ?>
		</td>

		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['id']),null,'Voulez vous vraiment supprimer cette utilisateur?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>

	</tr>

</table>

<?php echo $this->Paginator->numbers(); ?>