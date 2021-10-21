
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



		<td><?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>


	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>