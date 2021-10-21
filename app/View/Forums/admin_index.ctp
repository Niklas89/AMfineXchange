
<button style="float: right;" class="btn primary" type="button"
	onClick="window.location.href='/admin/forums/addcat'">Ajouter</button>
<h1>Configuration des Catégories (non supprimable par la suite)</h1>

<table class="zebra-striped">
	<tr>
	
	
	<tr>
		<th>ID</th>
		<th>Catégorie</th>
		<th>Action</th>
	</tr>

	<?php foreach ($cats as $k => $v): $v = current($v); ?>
	<tr>
		<td><?php echo $v['id'] ?></td>
		<td><?php echo $v['categorie'] ?></td>
		<td><?php  $this->Html->link("Supprimer",array('action'=>'admin_deletecat',$v['id']),null,'Voulez vous vraiment supprimer cette discussion?'); ?>
			<?php echo $this->Html->link("Editer",array('action'=>'admin_addcat',$v['id'])); ?>
		</td>

	</tr>
	<?php endforeach ?>


</table>

<br>
<br>
<br>
<br>

<button style="float: right;" class="btn primary" type="button"
	onClick="window.location.href='/admin/forums/addsujet'">Ajouter</button>
<h1>Configuration des Sujets (non supprimable par la suite)</h1>

<table class="zebra-striped">
	<tr>
	
	
	<tr>
		<th>ID</th>
		<th>Sujet</th>
		<th>Catégorie</th>
		<th>Action</th>
	</tr>

	<?php foreach ($sujets as $k => $v):  ?>
	<tr>
		<td><?php echo $v['Forumsujet']['id'] ?></td>
		<td><?php echo $v['Forumsujet']['sujet'] ?></td>
		<td><?php echo $v['Forumcat']['categorie'] ?></td>
		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_deletesujet',$v['Forumsujet']['id']),null,'Voulez vous vraiment supprimer cette discussion?'); ?>
			<?php echo $this->Html->link("Editer",array('action'=>'admin_addsujet',$v['Forumsujet']['id'])); ?>
		</td>

	</tr>
	<?php endforeach ?>


</table>
<div class="newsNavigation">


	<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

	<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
	<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

</div>
<br>
<br>
<br>
<br>


<h1>Modération des messages</h1>

<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Message</th>



		<th>Action</th>

	</tr>

	<?php foreach ($forums as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['content'] ?></td>


		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_delete',$v['id']),null,'Voulez vous vraiment supprimer cette discussion?'); ?>
			| <?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>











	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>