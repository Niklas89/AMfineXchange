

<p>
	<?php echo $this->Html->link("Ajouter un sondage",array('action'=>'edit'),array('class'=>'btn primary')); ?>
</p>
.
<p>
	<?php echo $this->Html->link("Export XLS des resultats",array('action'=>'xlssondage'),array('class'=>'btn primary')); ?>
</p>

<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Nom</th>



		<th>Action</th>

	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['name'] ?></td>



		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['id']),null,'Voulez vous vraiment supprimer cette évènement?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>


	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>