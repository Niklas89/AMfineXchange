<div class="page-header">

	<h1>Editer le sondage</h1>

</div>


<?php echo $this->Form->create('Product') ?>

<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')) ?>
<?php echo $this->Form->input('type',array('label'=>false,'type'=>'hidden')) ?>
<h1>SOLUTIONS, Soft & Services</h1>
<div class="ppp">
	<?php echo $this->Form->label('p1_id', 'Produits : ', 'label2'); ?>
	<?php echo $this->Form->select('p1_id',$p1,array('label'=>false,'class'=>'disp')) ?>
</div>
<div class="ppp">
	<?php echo $this->Form->label('p2_id', 'Services : ', 'label2'); ?>
	<?php echo $this->Form->select('p2_id',$p1,array('label'=>false,'class'=>'disp')) ?>
</div>
<div class="ppp">
	<?php echo $this->Form->label('p3_id', 'Bénéfices : ', 'label2'); ?>
	<?php echo $this->Form->select('p3_id',$p1,array('label'=>false,'class'=>'disp')) ?>
</div>
<div class="ppp">
	<?php echo $this->Form->label('p4_id', 'Best Practices : ', 'label2'); ?>
	<?php echo $this->Form->select('p4_id',$p1,array('label'=>false,'class'=>'disp')) ?>
</div>



<?php echo $this->Form->label('i1', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i1',array('label'=>false,'class'=>'input2')) ?>

<h1>A LA UNE</h1>
<?php echo $this->Form->label('i2', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i2',array('label'=>false,'class'=>'input2')) ?>
<h1>DISCUSSIONS</h1>
<?php echo $this->Form->label('i3', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i3',array('label'=>false,'class'=>'input2')) ?>
<h1>PARTENAIRE</h1>
<?php echo $this->Form->label('i4', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i4',array('label'=>false,'class'=>'input2')) ?>
<div class="ppp">
	<?php echo $this->Form->label('p7_id', 'Page partenaire : ', 'label2'); ?>
	<?php echo $this->Form->select('p7_id',$p1,array('label'=>false,'class'=>'disp')) ?>
</div>


<h1>LEGAL ROOM</h1>
<?php echo $this->Form->label('i5', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i5',array('label'=>false,'class'=>'input2')) ?>
<h1>USER CLUB</h1>
<?php echo $this->Form->label('i6', 'Intro : ', 'label2'); ?>
<?php echo $this->Form->input('i6',array('label'=>false,'class'=>'input2')) ?>



<?php echo $this->Form->submit('Enregistrer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>

