<div class="page-header">

	<h1>Editer la discussion</h1>

</div>



<?php echo $this->Form->create('Forum') ?>



<?php echo $this->Form->label('sujet', 'Sujet : ', 'label2'); ?>

<?php echo $this->Form->input('sujet',array('label'=>false,'class'=>'input2','type'=>'text')) ?>


<?php echo $this->Form->label('content', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('content',array('label'=>false,'class'=>'input2','type'=>'text','id'=>'textarea_id1')) ?>


<?php echo $this->Form->label('resume', 'Résumé(Si Topic) : ', 'label2'); ?>

<?php echo $this->Form->input('resume',array('label'=>false,'class'=>'input2','type'=>'textarea','id'=>'textarea_id2','style'=>'  width: 300px;    height: 150px;')) ?>


<?php echo $this->Form->input('id') ?>

<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements :
"textarea_id1,textarea_id2,nourlconvert", theme:'advanced',

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



<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>


<?php echo $this->Form->end() ?>