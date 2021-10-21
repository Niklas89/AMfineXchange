<table>
	<tr>
		<th>Image</th>
		<th>Nom</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($medias as $k => $v): $v=current($v) ?>
	<tr>
		<th><?php echo $this->Html->image($v['file'],array('style'=>'max-width:250px')) ?>
		</th>
		<th><?php echo $v['name'] ?>
		</th>
		<th><?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'Voulez vous vraiment supprimer ce fichier?'); ?>
			| <?php echo $this->Html->link("Insérer",array('action'=>'show',$v['id'])); ?>
		</th>
	</tr>
	<?php endforeach ?>
</table>



<h3>Ajouter une image</h3>



<?php echo $this->Form->create('Media',array('type'=>'file')); ?>

<?php echo $this->Form->label('file', 'Fichier', 'label2'); ?>

<?php echo $this->Form->input('file',array('label'=>false,'class'=>'input2','type'=>'file')) ?>



<?php echo $this->Form->label('name', "Nom de l'image: ", 'label2'); ?>

<?php echo $this->Form->input('name',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->end('Ajouter'); ?>