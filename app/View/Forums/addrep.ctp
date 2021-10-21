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
<div class="leco" style=" margin-left: 166px;">

<?php echo $this->Form->input('content',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea','id'=>'textarea_id1','value'=>$r2)) ?>
</div>
<?php 

if (isset($this->request->data['Forum']['forumsujet_id'])) {
	$this->request->params['pass']['0']=$this->request->data['Forum']['forumsujet_id'];
} ?>
<?php echo $this->Form->input('forumsujet_id',array('label'=>false,'type'=>'hidden','value'=>$this->request->params['pass']['0'])) ?>



<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>
<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements : "textarea_id1",

theme:'advanced', 'plugins':'advlist,inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bullist,numlist',

'theme_advanced_buttons2':'', 'theme_advanced_buttons3':'',

'theme_advanced_buttons4':'', 'theme_advanced_toolbar_location':'top',

'theme_advanced_resizing':true, 'paste_remove_styles':true,

'paste_remove_spans':true,
'image_explorer':'<?php echo $this->Html->url(array('action'=>'index','controller'=>'medias',$theid)); ?>', 
'image_edit':'<?php echo $this->Html->url(array('action'=>'show','controller'=>'medias')); ?>', 
<?php if(isset($this->request->data['Page']['id'])){
	$theid=$this->request->data['Page']['id'];
}else {
	$theid="";
} ?>
'paste_stip_class_attributes':'all', 'image_explorer':'<?php echo $this->Html->url(array('action'=>'index','controller'=>'medias',$theid)); ?>
', 'image_edit':'<?php echo $this->Html->url(array('action'=>'show','controller'=>'medias')); ?>
', relative_urls:false, content_css:'<?php echo $this->Html->url('/css/wysiwyg.css') ?>
' }); function send_to_editor(content){ var ed = tinyMCE.activeEditor;
ed.execCommand('mceInsertContent',false,content); }
<?php echo $this->Html->scriptEnd(); ?>

</div>