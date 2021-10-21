
<?php $this->set('title_for_layout',"AmfineXchange | Mot de passe"); ?>

<div class="pass1">


<h2>Changement de mot de passe</h2>

<?php echo $this->Form->create('User',array('action'=>'pass')) ?>


<div>
	<?php echo $this->Form->label('passwordold', 'Ancien mot de passe : ', 'label2'); ?>
	<?php echo $this->Form->input('passwordold',array('label'=>false,'class'=>'input2')) ?>
</div>

<div>
	<?php echo $this->Form->label('password1', 'Nouveau mot de passe : ', 'label2'); ?>
	<?php echo $this->Form->input('password1',array('label'=>false,'class'=>'input2')) ?>
</div>

<div>
	<?php echo $this->Form->label('password2', 'Nouveau mot de passe (Vérification) : ', 'label2'); ?>
	<?php echo $this->Form->input('password2',array('label'=>false,'class'=>'input2')) ?>
</div>


<?php echo $this->Form->submit('S\'enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>
</div>