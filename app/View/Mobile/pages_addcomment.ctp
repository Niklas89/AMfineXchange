<?php $this->set('title_for_layout',"AmfineXchange | Ajouter un commentaire"); ?>	
<div data-role="header" data-theme="a">
		<h1>Etude de cas | AmFineXchange</h1>
		<?php echo $this->Html->link("Message",
								array('controller'=>'mobile','action'=>'index'),
								array('class'=>'header ui-btn-right','data-icon'=>'custom', 'rel'=>'external', 					'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
					    ));
		?>
	</div><!-- /header -->
	
<div data-role="content" data-theme="d">
	<div class="admco">

	
	<div class="page-header">Ajouter un commentaire</div>

	<?php echo $this->Form->create('Pages',array('action'=>'addcomment')) ?>



	<?php echo $this->Form->label('message', 'Message : ', 'label2'); ?>

	<?php echo $this->Form->input('content',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea')) ?>

	<?php echo $this->Form->input('page_id',array('label'=>false,'type'=>'hidden','value'=>$id)) ?>




	<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

	<?php echo $this->Form->end() ?>

	</div>
</div>
<div data-position="fixed" data-role="footer" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-overlay" role="contentinfo" style="top: -982px;">
	<div class="custom-icons ui-navbar" data-role="navbar" role="navigation">
		<ul class="ui-grid-c">
			<li class="ui-block-a">
				<?php echo $this->Html->link("Accueil",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide")); ?> 
			</li>
			<li class="ui-block-b">
				<?php echo $this->Html->link("Profil",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-c">
				<?php echo $this->Html->link("Contact",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-d">
				<?php echo $this->Html->link("Autres",array('controller'=>'mobile','action'=>'others'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a','data-transition'=>"slide")); ?> 
			</li>
		</ul>
	</div>
</div>