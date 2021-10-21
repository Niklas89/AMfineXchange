<div class="page-header">

	<h1>Envoi du message</h1>

</div>



<?php echo $this->Form->create('User',array('action'=>'emailing3')) ?>


<?php echo $this->Form->label('titre', 'Titre du message : ', 'label2'); ?>

<?php echo $this->Form->input('titre',array('label'=>false,'class'=>'input2','type'=>'text')) ?>



<?php echo $this->Form->input('id',array('label'=>false,'class'=>'input2','type'=>'hidden')) ?>


<div class="sep"></div>
<?php echo $this->Form->label('content', 'Contenu : ', 'label2'); ?>

<div class="mc">

	<?php echo $this->Form->input('content',array('label'=>false,'id'=>'textarea_id1','row'=>20,'class'=>'input2','style'=>'  width: 666px;
			height: 700px;')) ?>

</div>




<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements :
"textarea_id1,nourlconvert", theme:'advanced',

'plugins':'advlist,inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,jutstify,|,fontsizeselect,forecolorpicker,|,link,unlink,|,image,|,formatselect,code',

'theme_advanced_buttons2':'', 'theme_advanced_buttons3':'',

'theme_advanced_buttons4':'', 'theme_advanced_toolbar_location':'top',

'theme_advanced_resizing':true, convert_urls : false,
'paste_remove_styles':true, 'paste_remove_spans':true,

'paste_stip_class_attributes':'all', relative_urls:false, content_css:'<?php echo $this->Html->url('/css/wysiwyg.css') ?>
' }); function send_to_editor(content){ var ed = tinyMCE.activeEditor;
ed.execCommand('mceInsertContent',false,content); }
<?php echo $this->Html->scriptEnd(); ?>



<?php echo $this->Form->submit('Sauvegarder / Brouillon', array('class' => 'input2'));?>


<?php echo $this->Form->end() ?>