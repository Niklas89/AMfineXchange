
<h3>Insérer un média</h3>
<img
	src="<?php echo $url ?>" style="max-width: 250px;" />
<br />
<br />



<?php echo $this->Form->create('Media'); ?>



<?php echo $this->Form->input('alt',array('label'=>"Description de l'image: ",'class'=>'input2','value'=>$alt)) ?>
<?php echo $this->Form->input('src',array('label'=>"Description de l'image: ",'class'=>'input2','value'=>$src)) ?>
<?php echo $this->Form->input('class',array('label'=>"Alignement",'options'=>array(
		'alignLeft'=>'Aligner à Gauche','alignCenter'=>'Centrer','alignRight'=>'Aligner à Droite'))); ?>

<?php echo $this->Form->end('Insérer dans ma page'); ?>