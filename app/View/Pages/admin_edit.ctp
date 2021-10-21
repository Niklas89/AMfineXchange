<div class="adme">

<div class="page-header">

	<h1>Editer la page</h1>

</div>

<script
	src="/jcrop/js/jquery.min.js"></script>
<script
	src="/jcrop/js/jquery.Jcrop.js"></script>
<link
	rel="stylesheet" href="/jcrop/css/jquery.Jcrop.css" type="text/css" />

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



<?php echo $this->Form->label('slug', 'Slug : ', 'label2'); ?>

<?php echo $this->Form->input('slug',array('label'=>false,'class'=>'input2','type'=>'text')) ?>


<?php echo $this->Form->label('type', 'Type de page : ', 'label2'); ?>
<?php $options = array('normal'=>'Contenu','normalsanscomment'=>'Contenu (sans commentaires)','compterendu'=>'Compte rendu','vide'=>'Vide'); ?>
<?php echo $this->Form->select('type',$options,array('label'=>false,'id'=>'drop2')) ?>
<br />


<div>
	<?php if(!empty($this->request->data['Page']['miniature']) && is_string($this->request->data['Page']['miniature']) && 1==2): ?>
	<img
		src="<?php echo '/img/'.$this->request->data['Page']['miniature'] ?>"
		alt="miniature"
		style="width: 47px; height: 47px; float: left; position: absolute; margin-left: 41px;">
	<?php endif; ?>
	<br />

	<?php echo $this->Form->label('miniature', 'Image', 'label2'); ?>

	<?php if(!empty($this->request->data['Page']['miniature']) && is_string($this->request->data['Page']['miniature'])): ?>
	<div class="imgzone">
		<img
			src="<?php echo '/img/'.$this->request->data['Page']['miniature'] ?>"
			id="cropbox" />
	</div>

	<!-- This is the form that our event handler fills -->

	<input type="hidden" id="x" name="x" /> <input type="hidden" id="y"
		name="y" /> <input type="hidden" id="w" name="w" /> <input
		type="hidden" id="h" name="h" />
	<button class="btn primary croped" type="submit">Croper</button>





	<?php endif; ?>

	<?php echo $this->Form->input('miniature',array('label'=>false,'class'=>'input2 sepy','type'=>'file')) ?>
</div>
<div class="sep"></div>
<?php echo $this->Form->label('content', 'Contenu : ', 'label2'); ?>

<div class="mc">

	<?php echo $this->Form->input('content',array('label'=>false,'id'=>'textarea_id1','row'=>20,'class'=>'input2','style'=>'  width: 666px;
			height: 700px;')) ?>

</div>


</style>
<div class="sideright">

	<?php echo $this->Form->label('online', 'Online : ', 'label2 labelo'); ?>

	<?php echo $this->Form->input('online',array('label'=>false,'class'=>'input2')) ?>

	<?php echo $this->Form->input('id') ?>
	<table id="tbl" style="width: 380px;">

		<?php if (empty($this->request->data['Page'])): ?>
		<?php 

		$this->request->data['Page']['diffusion']=0;
		$this->request->data['Page']['diffusion_bestpractices']=0;
		$this->request->data['Page']['diffusion_userclub']=0;
		$this->request->data['Page']['diffusion_legalroom']=0;
		$this->request->data['Page']['diffusion_legalroom2']=0;
		$this->request->data['Page']['diffusion_une']=0;
		$this->request->data['Page']['diffusion_autre']=0;
		?>
		<?php 	 endif ?>

		<tr>
			<td>Droits</td>
			<td>Diffusion</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_visiteurs', array('value' => 1)); ?>Visiteurs</td>
			<td><?php echo $this->Form->checkbox('diffusion_une', array('value' => 1)); ?>A
				la une</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_invite', array('value' => 1)); ?>Membre
				invité</td>
			<td><input class="drop" type="radio" name="data[Page][diffusion]"
				id="PageDiffusion0" value="Best Practices"
				<?php echo $this->request->data['Page']['diffusion_bestpractices']?'checked="checked"':'' ?>>Best
				Practices</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_legalroom', array('value' => 1)); ?>Legal
				Room Member</td>
			<td><input class="drop" type="radio" name="data[Page][diffusion]"
				id="PageDiffusion0" value="LegalRoom"
				<?php echo $this->request->data['Page']['diffusion_legalroom']?'checked="checked"':'' ?>>LegalRoom
				- Testimoniaux</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_userclub', array('value' => 1)); ?>User
				Club Member</td>

			<td><input class="drop" type="radio" name="data[Page][diffusion]"
				id="PageDiffusion0" value="LegalRoom2"
				<?php echo $this->request->data['Page']['diffusion_legalroom2']?'checked="checked"':'' ?>>LegalRoom
				- La « Loi », les documents</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_partenaire', array('value' => 1)); ?>Partenaire</td>
			<td><input class="drop" type="radio" name="data[Page][diffusion]"
				id="PageDiffusion0" value="USERCLUB"
				<?php echo $this->request->data['Page']['diffusion_userclub']?'checked="checked"':'' ?>>USERCLUB</td>

		</tr>
		<tr>
			<td><?php echo $this->Form->checkbox('droits_fullaccess', array('value' => 1)); ?>Full
				Access Member</td>
			<td><input class="drop" type="radio" name="data[Page][diffusion]"
				id="PageDiffusion0" value="autre"
				<?php echo $this->request->data['Page']['diffusion_autre']?'checked="checked"':''
					
					
				?>
				<?php if (($this->request->data['Page']['diffusion_legalroom2']==0) &&($this->request->data['Page']['diffusion_une']==0) && ($this->request->data['Page']['diffusion_bestpractices']==0) && ($this->request->data['Page']['diffusion_legalroom']==0) && ($this->request->data['Page']['diffusion_userclub']==0)): ?>
				checked="checked" <?php endif ?>>Autre</td>
		</tr>
		<tr>

			<td colspan="2">Affectation<?php echo $this->Form->select('affectation', array('1' => 'METIERS','2'=>'PARTIS PRIS','3'=>'MARCHE')); ?>
			</td>
		</tr>

	</table>

</div>

<?php echo $this->Form->label('user_id', 'Rédacteur : ', 'label2'); ?>

<?php echo $this->Form->select('user_id',$listu,array('label'=>false)) ?>

<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>



<?php echo $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

tinyMCE.init({ language:'fr', mode : "exact", elements : "textarea_id1",

theme:'advanced', 'plugins':'advlist,inlinepopups,plugimages',

'theme_advanced_buttons1':'bold,italic,underline,|,bullist,numlist,fontselect,|,justifyleft,justifycenter,justifyright,jutstify,|,fontsizeselect,forecolorpicker,|,link,unlink,|,visualaid,image,|,formatselect,code',

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