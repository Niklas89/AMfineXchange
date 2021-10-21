<div class="page-header">

	<h1>Sélectionnez les destinataires</h1>

</div>


<span> <input type="button" class="btn primary" id="sall"
	value="Tout sélectionné" /> <input type="button" class="btn primary"
	id="snone" value="Tout désélectionné" /> <input type="button"
	class="btn primary" id="snone"
	onclick="window.location.href='/admin/users/emailing3'"
	value="Créer un brouillon" />
</span>
<H3>
	Total:
	<?php echo $count ?>
	utilisateurs
</H3>

<script type="text/javascript">
	
$(document).ready(function() {

	  $('#sall').click(function(){
	  $('.checkmail').prop("checked", true);
	  });

	  $('#snone').click(function(){
	  $('.checkmail').prop("checked", false);
	  });

});
</script>
<?php echo $this->Form->create('User',array('action'=>'emailing2')) ?>
<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>X</th>

		<th>Email</th>

		<th>Société</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Date d'inscription</th>

		<th>Actif</th>



	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $this->Form->checkbox('u_'.$v['id'],array('label'=>"",'class'=>'checkmail')); ?>
		</td>

		<td><?php echo $v['email'] ?></td>

		<td><?php echo $v['societe'] ?></td>

		<td><?php echo $v['lastname'] ?></td>

		<td><?php echo $v['firstname'] ?></td>

		<td><?php echo $this->Formattext->date_fran2($v['created']) ?> <?php echo date('H:i:s',$v['created']) ?>
		</td>


		<td><?php echo $v['active']=='1'?'<span class="label3 success">Activé</span>':'<span class="label3 important">Non activé</span>' ?>
		</td>


	</tr>

	<?php endforeach ?>

	</tr>

</table>

<?php echo $this->Form->submit('Envoyer', array('class' => 'input2'));?>

<?php echo $this->Form->end() ?>