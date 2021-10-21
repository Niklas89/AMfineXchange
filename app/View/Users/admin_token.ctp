<script type="text/javascript">
function my_modal(id){
	$("#thep").text("<?php echo $this->Html->url('/users/signup', true) ?>?token="+id);
	$('#modal-from-dom').modal('show');
}
jQuery(document).ready(function($) {
$('#modal-from-dom').modal({
  keyboard: true,
  backdrop:true
})
});
</script>

<div class="admintok">


<div id="modal-from-dom" class="modal hide fade" style="display: none;">
	<div class="modal-header">
		<a href="#" class="close">×</a>
		<h3>Votre lien d'inscription</h3>
	</div>
	<div class="modal-body">
		<p id="thep">...</p>
	</div>

</div>

<div class="page-header">

	<h1>Gérer les Token</h1>

</div>
<div
	class="well">
	<p>
		<?php echo $this->Html->link("Ajouter 10 Tokens",array('action'=>'token10'),array('class'=>'btn primary')); ?>
	</p>
	<p>
		<?php echo $this->Html->link("Ajouter 100 Tokens",array('action'=>'token100'),array('class'=>'btn')); ?>
	</p>
	<p>
		<?php echo $this->Html->link("Ajouter 100 Tokens envoyés + xls",array('action'=>'token100txt'),array('class'=>'btn')); ?>
	</p>

	<p>
		<?php echo $this->Html->link("Supprimer les tokens utilisé",array('action'=>'tokenused'),array('class'=>'btn')); ?>
	</p>
	<!--<p><?php echo $this->Html->link("Supprimer les tokens envoyé",array('action'=>'tokensent'),array('class'=>'btn')); ?></p>-->
</div>

<table class="zebra-striped">

	<tr>
	
	
	<tr>

		<th>ID</th>

		<th>Token</th>

		<th>Statut</th>
		<th>Envoyé</th>
		<th>Actions</th>
	</tr>

	<?php foreach ($items as $k => $v): $v = current($v); ?>

	<tr>

		<td><?php echo $v['id'] ?></td>

		<td><?php echo $v['token'] ?></td>

		<td><?php echo $v['status']=='1'?'<span class="label3 important">Utilisé</span>':'<span class="label3 success">Libre</span>' ?>
		</td>
		<td><?php echo $v['sent']=='1'?'<span class="label3 important">Envoyé</span>':'<span class="label3 success">Non envoyé</span>' ?>
		</td>

		<td><?php echo $this->Html->link("Supprimer",array('action'=>'admin_deletetoken',$v['id']),null,'Voulez vous vraiment supprimer cette utilisateur?'); ?>

			<?php if ($v['sent']=='0'): ?> | <?php echo $this->Html->link("Marquer envoyé",array('action'=>'admin_tokenenv',$v['id']),null); ?>
			<?php endif ?> <?php if ($v['sent']=='0'): ?> | <a href="#"
			onClick="my_modal('<?php echo $v['token'] ?>');return false">Copier
				le lien d'enregistrement</a> <?php endif ?>
		</td>

	</tr>

	<?php endforeach ?>











	</tr>

</table>


<?php echo $this->Paginator->numbers(); ?>
</div>