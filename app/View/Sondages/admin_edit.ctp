<div class="page-header">

	<h1>Editer le sondage</h1>

</div>



<?php echo $this->Form->create('Sondage') ?>

<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')) ?>


<?php echo $this->Form->label('name', 'Nom du sondage : ', 'label2'); ?>

<?php echo $this->Form->input('name',array('label'=>false,'class'=>'input2')) ?>




<?php echo $this->Form->label('question', 'Question : ', 'label2'); ?>

<?php echo $this->Form->input('question',array('label'=>false,'class'=>'input2')) ?>




<?php echo $this->Form->label('r1', 'Réponse 1 : ', 'label2'); ?>

<?php echo $this->Form->input('r1',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('r2', 'Réponse 2 : ', 'label2'); ?>

<?php echo $this->Form->input('r2',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('r3', 'Réponse 3 : ', 'label2'); ?>

<?php echo $this->Form->input('r3',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('r4', 'Réponse 4 : ', 'label2'); ?>

<?php echo $this->Form->input('r4',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('r5', 'Réponse 5 : ', 'label2'); ?>

<?php echo $this->Form->input('r5',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('r6', 'Réponse 6 : ', 'label2'); ?>

<?php echo $this->Form->input('r6',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('actif', 'Actif : ', 'label2'); ?>

<?php echo $this->Form->select('actif',array('0'=>'Non','1'=>'Oui'),array('label'=>false,'class'=>'')) ?>

<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>

