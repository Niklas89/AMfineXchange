
<?php $this->set('title_for_layout',"AmfineXchange | S'enregistrer"); ?>

<div class="dbl1">

<h2>S'enregistrer</h2>

<?php echo $this->Form->create('User') ?>



<?php echo $this->Form->label('firstname', 'Prénom : ', 'label2'); ?>

<?php echo $this->Form->input('firstname',array('label'=>false,'class'=>'input2')) ?>


<?php echo $this->Form->label('lastname', 'Nom : ', 'label2'); ?>

<?php echo $this->Form->input('lastname',array('label'=>false,'class'=>'input2')) ?>


<?php echo $this->Form->label('societe', 'Société / Organisme : ', 'label2'); ?>

<?php echo $this->Form->input('societe',array('label'=>false,'class'=>'input2','type'=>'text')) ?>



<?php echo $this->Form->label('email', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->label('password', 'Password : ', 'label2'); ?>

<?php echo $this->Form->input('password',array('label'=>false,'class'=>'input2')) ?>

<?php 
if (isset($this->request->query['token'])) {
	$tok = $this->request->query['token'];
}else {
	$tok="";
}
?>
<div class="token">
	<span class="desc"> Si vous disposez d'un Token, inscrivez le
		ci-dessous: </span>
	<?php echo $this->Form->label('token', 'Votre Token : ', 'label2'); ?>

	<?php echo $this->Form->input('token',array('label'=>false,'class'=>'input2','value'=>$tok)) ?>

</div>


<?php echo $this->Form->submit('S\'enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>
</div>