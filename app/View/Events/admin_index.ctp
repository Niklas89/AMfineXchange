

<p>
	<?php echo $this->Html->link("Ajouter un évènement",array('action'=>'edit'),array('class'=>'btn primary')); ?>
</p>

<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Theme</th>

		<th>Date</th>

		<th>Action</th>

	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $this->Formattext->formattext($v['theme'],60) ?></td>

		<td><?php echo $v['date'] ?></td>

		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['id']),null,'Voulez vous vraiment supprimer cette évènement?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>











	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>