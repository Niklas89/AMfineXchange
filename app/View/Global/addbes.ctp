<div class="addbes">

<div class="page-header">

	<h1>Editer la page</h1>

</div>



<script type="text/javascript">
	$(document).ready(function() {

			$(function(){

				$('#cropbox').Jcrop({
					aspectRatio: 1,
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Veuillez sélectionner une zone.');
				return false;
			};


		affichagedrop();


		$('.drop').click(function(){
		affichagedrop();
		});
		function affichagedrop(){
			var valeur = $('#drop').attr('checked');
				
			if (valeur == "checked") {
			
				$('.miniature').css('display','block');
			}else{
				
			$('.miniature').css('display','none');
			};
		}

	});
</script>







<?php echo $this->Form->create('Page',array('type'=>'file','onsubmit'=>'return checkCoords();')) ?>



<?php echo $this->Form->label('name', 'Nom de la page : ', 'label2'); ?>

<?php echo $this->Form->input('name',array('label'=>false,'class'=>'input2','type'=>'text')) ?>




<div>
	<?php if(!empty($this->request->data['Page']['miniature']) && is_string($this->request->data['Page']['miniature']) && 1==2): ?>
	<img
		src="<?php echo '/img/'.$this->request->data['Page']['miniature'] ?>"
		alt="miniature"
		style="width: 47px; height: 47px; float: left; position: absolute; margin-left: 41px;">
	<?php endif; ?>
	<br />

	<?php echo $this->Form->label('miniature', 'Image', 'label2'); ?>


	<?php echo $this->Form->input('miniature',array('label'=>false,'class'=>'input2 sepy','type'=>'file')) ?>
</div>
<div class="sep"></div>
<?php echo $this->Form->label('content', 'Contenu : ', 'label2'); ?>

<div class="mc">

	<?php echo $this->Form->input('content',array('label'=>false,'id'=>'textarea_id1','row'=>20,'class'=>'input2','style'=>'  width: 400px;
			height: 200px;')) ?>

</div>


<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>



<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements : "textarea_id1",

theme:'advanced', 'plugins':'advlist,inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bullist,numlist,fontselect,|,justifyleft,justifycenter,justifyright,jutstify',

'theme_advanced_buttons2':'fontsizeselect,forecolorpicker,|,link,unlink,|,image,|,formatselect,code',

'theme_advanced_buttons3':'', 'theme_advanced_buttons4':'',

'theme_advanced_toolbar_location':'top', 'theme_advanced_resizing':true,

'paste_remove_styles':true, 'paste_remove_spans':true,
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