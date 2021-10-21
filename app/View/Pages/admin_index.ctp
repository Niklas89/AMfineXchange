<div class="page-header">

	<!--	<h1><?php echo $this->Html->link("Toutes les pages",array('action'=>'index','all')); ?> | <?php echo $this->Html->link("A la une",array('action'=>'index','une')); ?> | <?php echo $this->Html->link("Cgu,Policy..",array('action'=>'index','footer')); ?></h1>-->
</div>

<p>
	<?php echo $this->Html->link("Ajouter une page",array('action'=>'edit'),array('class'=>'btn primary')); ?>
</p>

<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Nom</th>

		<th>En ligne</th>

		<th>Action</th>

	</tr>

	<?php foreach ($pages as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['name'] ?></td>

		<td><?php echo $v['online']=='1'?'<span class="label3 success">En ligne</span>':'<span class="label3 important">Hors ligne</span>' ?>
		</td>

		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['id']),null,'Voulez vous vraiment supprimer cette page?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>



	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>