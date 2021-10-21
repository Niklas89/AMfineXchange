<?php $this->set('title_for_layout',"Envoyer un message"); ?>
<div data-role="header" data-theme="a">
	<h1>Envoyer un message</h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">




<?php echo $this->Form->create('Message',array('url'=>'/mobile/messagerieenvoyer/'.$this->request->params['pass']['0'])) ?>



<?php echo $this->Form->label('message', 'Message : ', 'label2'); ?>

<?php echo $this->Form->input('message',array('label'=>false,'style'=>'width: 400px;height: 90px;','class'=>'input2 xxlarge','type'=>'textarea')) ?>

<?php echo $this->Form->input('contact_id',array('label'=>false,'type'=>'hidden','value'=>$this->request->params['pass']['0'])) ?>




<?php echo $this->Form->submit('Envoyer', array('class' => 'input2 btn primary'));?>

<?php echo $this->Form->end() ?>





</div>
<?php echo $this->element('footer_mobile'); ?>