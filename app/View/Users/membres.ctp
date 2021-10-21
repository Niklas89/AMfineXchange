<div class="membrescss">


<?php $this->set('title_for_layout',"AmfineXchange | Liste des membres"); ?>
<?php echo $this->element('partage') ?>
<div
	style="clear: both; height: 1px;"></div>
<LINK
	rel="stylesheet" type="text/css" href="/css/mem.css">
<p class="allMembersNews">




	<?php $this->requestAction('/pages/showfooter/31') ?>

	<?php $action = "profilvoir"; ?>
	<?php if(isset($this->request->query['ajout'])): ?>
<div class="notif success" style="margin-top: 10px;">

	<p>
		<strong>Cliquez</strong> sur un membre pour l'ajouter à vos contacts
	</p>
</div>
<?php $action = "contactadd"; ?>
<?php endif; ?>
<?php if(isset($this->request->query['messagerie'])): ?>

<div class="notif success" style="margin-top: 10px;">

	<p>
		<strong>Cliquez</strong> sur un membre pour lui envoyer un message
	</p>
</div>
<?php $action = "messagerieenvoyer"; ?>
<?php endif; ?>
</p>

<p>
	<?php echo $this->Form->create('User',array('action'=>'membres','name'=>'form1')) ?>



	<?php if(!isset($this->request->query['messagerie'])  &&  !isset($this->request->query['byid'])): ?>
	<select onChange="submit()" name="data[User][filtre]" id="allMembers"
		class="selectbox">
		<?php 
		if( !isset($filtre)) {
			$filtre="";
		}
		?>
		<?php if(isset($this->request->query['byid'])): ?>

		<option value="" selected="selected">Sélectionner</option>
		<?php endif; ?>
		<option value=""
		<?php if(($filtre  == "") && !isset($this->request->query['byid'])) echo 'selected="selected"'; ?>>Tous
			les Membres</option>



		<option value="Visiteurs"
		<?php if($filtre  == "Visiteurs") echo 'selected="selected"'; ?>>Visiteurs</option>
		<option value="Membre invité"
		<?php if($filtre  == "Membre invité") echo 'selected="selected"'; ?>>Membre
			invité</option>
		<option value="Legal Room Member"
		<?php if($filtre  == "Legal Room Member") echo 'selected="selected"'; ?>>Legal
			Room Member</option>
		<option value="User Club Member"
		<?php if($filtre  == "User Club Member") echo 'selected="selected"'; ?>>User
			Club Member</option>
		<option value="Partenaire"
		<?php if($filtre  == "Partenaire") echo 'selected="selected"'; ?>>Partenaire</option>
		<option value="Full Access"
		<?php if($filtre  == "Full Access") echo 'selected="selected"'; ?>>Membres
			Full Access</option>

	</select>


	<?php endif; ?>



	<?php echo $this->Form->end() ?>

</p>
</form>

<div
	style="clear: both; height: 1px;"></div>

<div id="membersInfo" class="doom">

	<?php foreach ($users as $k => $v): ?>

	<?php if ($v['User']['role'] != 2): ?>
	<div class="mod modal hide " id="modal-from-domd<?php echo $k ?>">
		<div class="pic">
			<img style="width: 84px; height: 84px;"
				src="<?php echo $v['User']['photo'] ?>"
				alt="<?php echo $v['User']['username'] ?>" />&nbsp;
		</div>
		<div class="name" style="font-size: 15px; width: 284px;">
			&nbsp;
			<?php echo $v['User']['firstname'] ?>
			<?php echo $v['User']['lastname'] ?>
			&nbsp;
		</div>
		<div class="status"
			style="position: absolute; margin-left: -75px; width: 390px; border-style: none; text-align: left; padding-left: 169px; margin-top: -3px;">
			&nbsp;
			<?php echo $this->Formattext->formattext($v['User']['fonction'],40) ?>
			&nbsp;
		</div>
		<div class="cont" style="margin-left: 94px; margin-top: -15px;">
			&nbsp;
			<?php echo $v['User']['countrel'] ?>
			contact(s), date d’inscription :
			<?php echo $this->Formattext->date_fran2($v['User']['created']) ?>
			&nbsp;
		</div>

		<table class="taby" style="width: auto;">
			<tr>
				<td class="gr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;">Mini-bio
					:</td>
				<td class="grrr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;"><?php echo $this->Formattext->formattext($v['User']['presentation'],80) ?>&nbsp;</td>
			</tr>
			<tr>
				<td class="gr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;">Votre
					société :</td>
				<td class="grrr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;"><?php echo $this->Formattext->formattext($v['User']['societe'],80) ?>&nbsp;</td>
			</tr>
			<tr>
				<td class="gr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;">Professionnel
					:</td>
				<td class="grrr"
					style="margin-left: 0; margin: 0; margin-bottom: 0; margin-right: 0; margin-top: 0; padding-top: 0; padding: 0; padding-bottom: 0; padding-left: 0; padding-right: 0;"><?php echo $this->Formattext->formattext($v['User']['centresinterets'],80) ?>&nbsp;</td>
			</tr>
		</table>


	</div>



	<div class="member_bg">
		<div>
			<a id="memberbg<?php echo $k ?>" class="memberbg"
				title="<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>"
				data-bs-popover-content="A finir" data-bs-popover-options="{}"
				href="/users/<?php echo $action ?>/<?php echo $v['User']['id'] ?>"><img
				style="width: 84px; height: 84px;"
				src="<?php echo $v['User']['photo'] ?>"
				alt="<?php echo $v['User']['username'] ?>" /> </a>
			<p>
				<a
					href="/users/<?php echo $action ?>/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>
				</a>
			</p>
		</div>
	</div>
	<?php endif ?>


	<?php endforeach ?>

	<div style="clear: both; height: 1px;"></div>

	<div class="newsNavigation">
		<?php 
		$filter = "";
		if(isset($this->request->query['data']['User']['filtre'])){
			$filter = $this->request->query['data']['User']['filtre'];
		}
		if(isset($this->request->data['User']['filtre'])){
			$filter = $this->request->data['User']['filtre'];
		}
		if(isset($this->request->params['named']['filter'])){
			$filter=$this->request->params['named']['filter'];

		}


		$this->Paginator->options(array(
				'url' => array(
						'filter' => $filter
				)
		));


		?>

		<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

		<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
		<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

	</div>
</div>

</div>