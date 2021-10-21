<?php $this->set('title_for_layout',"AmfineXchange | Rappel du mot de passe"); ?>

<h2>Rappel</h2>

<?php echo $this->Form->create('User',array('url'=>'/users/rappel')) ?>


<?php echo $this->Form->label('email', 'Email utilisé : ', 'label2'); ?>

<?php echo $this->Form->input('email',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->input('rappel',array('type'=>'hidden','value'=>'rappel')) ?>


<?php echo $this->Form->submit('Me renvoyer mon mot de passe', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>