<div class="admco">

<?php $this->set('title_for_layout',"AmfineXchange | Ajouter un commentaire"); ?>
<div class="page-header">Ajouter un commentaire</div>

<?php echo $this->Form->create('Pages',array('action'=>'addcomment')) ?>



<?php echo $this->Form->label('message', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('content',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea')) ?>

<?php echo $this->Form->input('page_id',array('label'=>false,'type'=>'hidden','value'=>$id)) ?>




<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>

</div>