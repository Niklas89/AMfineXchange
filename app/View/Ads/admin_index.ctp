<h1>Gestion des Publicités</h1>
<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Taille</th>



		<th>Action</th>

	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['size'] ?></td>



		<td><?php echo $this->Html->link("Editer",array('action'=>'admin_edit',$v['id'])); ?>
		</td>

	</tr>

	<?php endforeach ?>

	</tr>

</table>

<?php echo $this->Paginator->numbers(array()); ?>


<br>
<br>

<h1>Configuration des évènements en sidebar</h1>

<?php echo $this->Form->create('Eventfront',array('action'=>'savefront')) ?>



<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden','value'=>1)) ?>


<?php echo $this->Form->label('event_id1', 'AMfineTrust : ', 'label2'); ?>
<?php echo $this->Form->select('event_id1',$options2,array('label'=>false,'id'=>'drop2')) ?>
<br />

<?php echo $this->Form->label('event_id2', 'User Club : ', 'label2'); ?>
<?php echo $this->Form->select('event_id2',$options2,array('label'=>false,'id'=>'drop2')) ?>
<br />

<?php echo $this->Form->label('event_id3', 'Business Dating : ', 'label2'); ?>
<?php echo $this->Form->select('event_id3',$options2,array('label'=>false,'id'=>'drop2')) ?>
<br />

<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>




