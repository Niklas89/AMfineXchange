<?php $this->set('title_for_layout',"AmfineXchange | Inviter des relations"); ?>
<h2>Contacter des relations</h2>

<?php echo $this->Form->create('Relation') ?>





<?php echo $this->Form->label('email', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->label('email2', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email2',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->label('email3', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email3',array('label'=>false,'class'=>'input2')) ?>





<?php echo $this->Form->label('email4', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email4',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->label('email5', 'Email : ', 'label2'); ?>

<?php echo $this->Form->input('email5',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->submit('Envoyer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>