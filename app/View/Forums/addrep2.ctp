<div class="addrep">
<?php $this->set('title_for_layout',"AmfineXchange | Ajouter un commentaire"); ?>
<div class="page-header">Ajouter une réponse</div>

<?php echo $this->Form->create('Forums',array('action'=>'addrep/'.$this->request->params['pass']['0'])) ?>


<?php 

if (isset($this->request->data['Forum']['sujet'])) {
	$r1 = $this->request->data['Forum']['sujet'];
}else{
	$r1 = "";
}
if (isset($this->request->data['Forum']['content'])) {
	$r2 = $this->request->data['Forum']['content'];
}else{
	$r2 = "";
}

if (isset($this->request->data['Forum']['id'])) {
	$r3 = $this->request->data['Forum']['id'];
}else{
	$r3 = "";
}


?>
<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden','value'=>$r3)) ?>

<?php echo $this->Form->label('sujet', 'Titre : ', 'label2'); ?>

<?php echo $this->Form->input('sujet',array('label'=>false,'type'=>'text','class'=>'input2','value'=>$r1)) ?>


<?php echo $this->Form->label('content', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('content',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea','value'=>$r2)) ?>
<?php 

if (isset($this->request->data['Forum']['forumsujet_id'])) {
	$this->request->params['pass']['0']=$this->request->data['Forum']['forumsujet_id'];
} ?>
<?php echo $this->Form->input('forumsujet_id',array('label'=>false,'type'=>'hidden','value'=>$this->request->params['pass']['0'])) ?>



<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>

</div>