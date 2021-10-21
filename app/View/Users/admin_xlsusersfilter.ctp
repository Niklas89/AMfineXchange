<div class="page-header">

	<h1>Filtre de l'export XLS</h1>

</div>
<script type="text/javascript">
	$(document).ready(function() {
		$.datepicker.setDefaults($.datepicker.regional['fr']);
$('.datep').datepicker({
	dateFormat:"yy-mm-dd",changeYear: true,changeMonth: true,
	  minDate: "-100y", // it will set minDate from 25 October 2009
     showAnim: 'fold',
     yearRange: '2011:2030'

});
	});
</script>


<?php echo $this->Form->create('User',array('action'=>'xlsusersfilter','name'=>'form1')) ?>

<div class="form f2">
	<select name="data[User][filtre]" id="allMembers" class="selectbox">
		<option value="" selected="selected">Tous les Membres</option>
		<option value="Visiteurs">Visiteurs</option>
		<option value="Membre invité">Membre invité</option>
		<option value="Legal Room Member">Legal Room Member</option>
		<option value="User Club Member">User Club Member</option>
		<option value="Partenaire">Partenaire</option>
		<option value="Full Access">Membres Full Access</option>
	</select>
</div>

<div class="ladate">
	<span>Date de début:</span>
	<?php echo $this->Form->input('date1',array('class'=>'datep','value'=>'2011-01-01','label'=>false,'type'=>'text','div'=>false)); ?>

</div>
<div class="ladate2">
	<span>Date de fin:</span>
	<?php echo $this->Form->input('date2',array('class'=>'datep','label'=>false,'value'=>'2030-01-01','type'=>'text','div'=>false)); ?>

</div>
<div class="well" style="margin-top: 54px;">

	<button class="btn primary">Export</button>

</div>




<?php echo $this->Form->end() ?>

