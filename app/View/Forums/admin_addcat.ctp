<div class="addcat">


<div class="page-header">

	<h1>Editer une catégorie</h1>

</div>




<?php echo $this->Form->create('Forums',array('action'=>'addcat')) ?>
<?php 

if(!isset($this->request->data['Forum']['categorie'])){
	$this->request->data['Forum']['categorie']="";
}
if(!isset($this->request->data['Forum']['id'])){
	$this->request->data['Forum']['id']="";
}



?>


<?php echo $this->Form->label('categorie', 'Catégorie : ', 'label2'); ?>

<?php echo $this->Form->textarea('categorie',array('label'=>false,'class'=>'input2','type'=>'text','value'=>$this->request->data['Forum']['categorie'])) ?>

<?php echo $this->Form->input('id',array('label'=>false,'class'=>'input2','type'=>'hidden','value'=>$this->request->data['Forum']['id'])) ?>



<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>
</div>