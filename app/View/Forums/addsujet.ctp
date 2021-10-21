<div class="addsu">
<div class="page-header">

	<h1>Proposer le sujet</h1>

</div>



<?php echo $this->Form->create('Forums',array('type'=>'file','action'=>'addsujet')) ?>


<br>

<?php 

if(!isset($this->request->data['Forum']['sujet'])){
	$this->request->data['Forum']['sujet']="";
}
if(!isset($this->request->data['Forum']['message'])){
	$this->request->data['Forum']['message']="";
}
if(!isset($this->request->data['Forum']['id'])){
	$this->request->data['Forum']['id']="";
}


?>

<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden','value'=>$this->request->data['Forum']['id'])) ?>
<?php echo $this->Form->label('sujet', 'Sujet : ', 'label2'); ?>

<?php echo $this->Form->input('sujet',array('label'=>false,'class'=>'input2','value'=>$this->request->data['Forum']['sujet'])) ?>


<?php echo $this->Form->label('message', 'Contenu du sujet : ', 'label2',array('style'=>'     padding-left: 15px;')); ?>

<div class="area" style="margin-top: 32px; margin-left: 36px;">
	<?php echo $this->Form->input('message',array('label'=>false,'class'=>'input2','id'=>'textarea_id1','value'=>$this->request->data['Forum']['message'])) ?>

</div>

<?php 
if(isset($this->request->params['pass']['0'])){
	$val = $this->request->params['pass']['0'];
}
?>



<?php echo $this->Form->input('forumcat_id',array('label'=>false,'value'=>$val,'type'=>'hidden')) ?>


<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>

<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements : "textarea_id1",

theme:'advanced', 'plugins':'inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bulllist,numlist,justifyleft,justifycenter,justifyright,jutstify,|,fontsizeselect,forecolorpicker,|,link,unlink,|,visualaid,image,|,formatselect,code',

'theme_advanced_buttons2':'', 'theme_advanced_buttons3':'',

'theme_advanced_buttons4':'', 'theme_advanced_toolbar_location':'top',

'theme_advanced_resizing':true, 'paste_remove_styles':true,

'paste_remove_spans':true,
<?php if(isset($this->request->data['Forum']['id'])){
	$theid=$this->request->data['Forum']['id'];
}else {
	$theid="";
} ?>
'paste_stip_class_attributes':'all',

relative_urls:false, 
content_css:'<?php echo $this->Html->url('/css/wysiwyg.css') ?>' });
function send_to_editor(content){ var ed = tinyMCE.activeEditor;
ed.execCommand('mceInsertContent',false,content); }
<?php echo $this->Html->scriptEnd(); ?>

</div>