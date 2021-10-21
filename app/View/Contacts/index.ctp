<div class="foco">
<?php $this->set('title_for_layout',"AmfineXchange | Formulaire de contact"); ?>
<div class="page-header">Formulaire de Contact</div>
<?php 

$prenom = "";
$nom="";
$email = "";
if(isset($moi['User']['firstname'])){
	$prenom = $moi['User']['firstname'];
}
if(isset($moi['User']['lastname'])){
	$nom=$moi['User']['lastname'];
}
if(isset($moi['User']['email'])){
	$email = $moi['User']['email'];
}

?>
<?php echo $this->Form->create('Contact') ?>


<?php echo $this->Form->label('nature', 'Nature de votre demande : ', 'label2'); ?>
<?php $options=array('Renseignement'=>'Renseignement','Devis'=>'Devis') ?>
<?php echo $this->Form->input('nature',array('options'=>$options,'label'=>false,'class'=>'input2')) ?>
<br />
<?php echo $this->Form->label('nom', 'Nom : ', 'label2'); ?>

<?php echo $this->Form->input('nom',array('label'=>false,'class'=>'input2','value'=>$nom)) ?>


<?php echo $this->Form->label('prenom', 'Prénom : ', 'label2'); ?>

<?php echo $this->Form->input('prenom',array('label'=>false,'class'=>'input2','value'=>$prenom)) ?>


<?php echo $this->Form->label('email', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email',array('label'=>false,'class'=>'input2','value'=>$email)) ?>


<?php echo $this->Form->label('message', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('message',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea')) ?>




<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>

</div>