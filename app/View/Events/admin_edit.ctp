<div class="eed">
<div class="page-header">

	<h1>Editer l'évènement</h1>

</div>


<script type="text/javascript">
	$(document).ready(function() {
		$.datepicker.setDefaults($.datepicker.regional['fr']);
$('.datep').datepicker({
	dateFormat:"yy-mm-dd",
	minDate:0
});




	});
</script>



<?php echo $this->Form->create('Event',array('type'=>'file')) ?>

<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')) ?>
<br>
<br>
<br>
<?php echo $this->Form->label('date', 'Date : ', 'label2'); ?>

<?php echo $this->Form->input('date',array('label'=>false,'type'=>'text','class'=>'datep')) ?>





<div class="miniature" style="">
	<?php if(!empty($this->request->data['Event']['logo']) && is_string($this->request->data['Event']['logo'])): ?>
	<img src="<?php echo '/img/'.$this->request->data['Event']['logo'] ?>"
		alt="miniature"
		style="width: 47px; height: 47px; float: left; position: absolute; margin-left: 41px;">
	<?php endif; ?>
	<br />

	<?php echo $this->Form->label('logo', 'Logo : ', 'label2'); ?>

	<?php echo $this->Form->input('logo',array('label'=>false,'class'=>'input2','type'=>'file')) ?>
</div>

<?php echo $this->Form->label('baseline', 'Baseline : ', 'label2'); ?>

<?php echo $this->Form->input('baseline',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('organise', 'Lieu : ', 'label2'); ?>

<?php echo $this->Form->input('organise',array('label'=>false,'class'=>'input2')) ?>

<?php echo $this->Form->label('organisateur', 'Organisateur : ', 'label2'); ?>

<?php echo $this->Form->input('organisateur',array('label'=>false,'class'=>'input2')) ?>


<?php echo $this->Form->label('finished', 'Mode Compte-rendu : ', 'label2'); ?>

<?php echo $this->Form->input('finished',array('label'=>false,'class'=>'input2')) ?>


<?php echo $this->Form->label('compterendu', 'Page compte-rendu : ', 'label2'); ?>


<?php echo $this->Form->select('compterendu',$pages,array('label'=>false,'class'=>'disp')) ?>
<br>
<br>
<br>

<?php echo $this->Form->label('theme', 'Thème : ', 'label2'); ?>

<?php echo $this->Form->input('theme',array('label'=>false,'class'=>'input2','id'=>'textarea_id2')) ?>

<?php echo $this->Form->label('presentation', 'Présentation : ', 'label2'); ?>

<?php echo $this->Form->input('presentation',array('label'=>false,'class'=>'input2','id'=>'textarea_id1')) ?>



<?php echo $this->Form->label('programme', 'Programme : ', 'label2'); ?>

<?php echo $this->Form->input('programme',array('label'=>false,'id'=>'textarea_id3','class'=>'input2','style'=>'  width: 500px;
		height: 174px;')) ?>






<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>

<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements :
"textarea_id1,textarea_id2,textarea_id3", theme:'advanced',


'plugins':'advlist,inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,jutstify,|,fontsizeselect,forecolorpicker,|,link,unlink,|,visualaid,image,|,formatselect,code',

'theme_advanced_buttons2':'', 'theme_advanced_buttons3':'',

'theme_advanced_buttons4':'', 'theme_advanced_toolbar_location':'top',

'theme_advanced_resizing':true, 'paste_remove_styles':true,

'paste_remove_spans':true,
<?php if(isset($this->request->data['Event']['id'])){
	$theid=$this->request->data['Event']['id'];
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