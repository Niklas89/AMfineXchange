<div class="page-header">

	<h1>Editer un utilisateur</h1>

</div>



<?php echo $this->Form->create('User') ?>






<?php echo $this->Form->label('email', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email',array('label'=>false,'class'=>'input2')) ?>



<div class="membership">
	<?php echo $this->Form->label('membership', 'Accès : ', 'label2'); ?>

	<?php echo $this->Form->select('membership',array('Visiteurs'=>'Visiteurs','Membre invité'=>'Membre invité','Legal Room Member'=>'Legal Room Member','User Club Member'=>'User Club Member','Partenaire'=>'Partenaire','Full Access Member'=>'Full Access Member'),array('label'=>false)) ?>
</div>




<?php echo $this->Form->label('active', 'Actif : ', 'label2'); ?>

<?php echo $this->Form->input('active',array('label'=>false)) ?>
<?php 

$active=0;
if(isset($this->request->data)){
	$active = $this->request->data['User']['active'];
}

?>
<?php echo $this->Form->input('activeold',array('label'=>false,'value'=>$active,'type'=>'hidden')) ?>


<?php if ($me['User']['id'] == 1): ?>
<div class="role" style="width: 0;">

	<?php echo $this->Form->label('role', 'Role : ', 'label2'); ?>
	<?php echo $this->Form->select('role',array('0'=>'Aucun','1'=>'Admin','3'=>'Modérateur')) ?>
</div>

<?php endif ?>

<?php if ($me['User']['role'] == 1): ?>

<?php if(($this->request->data['User']['role'] != 2) && ($this->request->data['User']['role'] != 1)): ?>
<div class="role" style="width: 0;">

	<?php echo $this->Form->label('role', 'Role : ', 'label2'); ?>
	<?php echo $this->Form->select('role',array('0'=>'Aucun','3'=>'Modérateur')) ?>
</div>

<?php endif ?>

<?php endif ?>




<?php echo $this->Form->input('id') ?>

<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>