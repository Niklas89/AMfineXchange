<div class="edit2">

<div class="page-header">

	<h1>Editer un commentaire</h1>

</div>

<?php echo $this->Form->create('Eventcomment') ?>


<?php echo $this->Form->label('content', 'Contenu : ', 'label2'); ?>

<?php echo $this->Form->textarea('content',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->input('id',array('label'=>false,'class'=>'input2','type'=>'hidden')) ?>
<?php echo $this->Form->input('user_id',array('label'=>false,'class'=>'input2','type'=>'hidden')) ?>
<?php echo $this->Form->input('page_id',array('label'=>false,'class'=>'input2','type'=>'hidden')) ?>


<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>
</div>