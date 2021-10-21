<div class="page-header">

	<h1>Editer la publicité</h1>

</div>






<?php echo $this->Form->create('Ad') ?>

<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')) ?>


<?php echo $this->Form->label('content', 'Code HTML : ', 'label2'); ?>

<?php echo $this->Form->input('content',array('label'=>false,'class'=>'input2','type'=>'textarea','style'=>'    width: 500px;
		height: 150px;')) ?>

<?php echo $this->Form->label('open', 'Actif : ', 'label2'); ?>

<?php echo $this->Form->select('open',array('0'=>'Non','1'=>'Oui'),array('label'=>false,'class'=>'')) ?>

<?php echo $this->Form->input('size',array('label'=>false,'class'=>'input2','type'=>'hidden')) ?>


<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>

