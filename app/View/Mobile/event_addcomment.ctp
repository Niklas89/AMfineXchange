<?php $this->set('title_for_layout',"Ajouter un commentaire"); ?>
<div data-role="header" data-theme="a">
	<h1>Ajouter un commentaire</h1>
	<?php echo $this->Html->link("Message",
							array('controller'=>'mobile','action'=>'index'),
							array('class'=>'message ui-btn-right','data-icon'=>'custom', 'rel'=>'external','data-theme'=>'c','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
					    ));
	?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">





<?php echo $this->Form->create('Events',array('action'=>'addcomment')) ?>



<?php echo $this->Form->label('message', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('content',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea')) ?>

<?php echo $this->Form->input('event_id',array('label'=>false,'type'=>'hidden','value'=>$id)) ?>




<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>




</div>
<?php echo $this->element('footer_mobile'); ?>