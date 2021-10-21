<?php $this->set('title_for_layout',"Communauté"); ?>
<div data-role="header" data-theme="a">
	<h1>Communauté</h1>
	<?php echo $this->element('header_noback_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">


<p>
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
		Sélectionner un membre à qui envoyer un message
	</p>
</div>
<?php $action = "messagerieenvoyer"; ?>
<?php endif; ?>
</p>


<p>
	<?php echo $this->Form->create('User',array('action'=>'communaute','name'=>'form1')) ?>



	<?php if(!isset($this->request->query['messagerie'])  &&  !isset($this->request->query['byid'])): ?>
<!--	<select onChange="submit()" name="data[User][filtre]" id="allMembers"
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

	</select> -->
	
	

	<?php endif; ?>



	<?php echo $this->Form->end() ?>

</p>
</form>
<div>

	<?php foreach ($users as $k => $v): ?>

	<?php if ($v['User']['role'] != 2): ?>




	<ul data-role="listview" data-inset="true">
		<li>
			<a id="memberbg<?php echo $k ?>" class="memberbg"
				title="<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?>"
				data-bs-popover-content="A finir" data-bs-popover-options="{}"
				href="<?php echo $action ?>/<?php echo $v['User']['id'] ?>">
				<?php echo $this->Html->image($v['User']['photo'], array('alt' => $v['User']['username'], 'style' => 'width:80px;height:80px;')); ?>
				<div style="float:left;display:inline-block">
					<?php
						echo $this->Html->image($v['User']['img'], array('alt' => $v['User']['membership'], 'style' => 'width:35px;height:35px')); 
					?>
				</div>
				<div style="float:left;display:inline-block;margin-left:20px;">
			<h3>
			<?php echo $v['User']['firstname'].' '.$v['User']['lastname'] ?></h3>
			<p>
				<?php echo $v['User']['membership'] ?>
			</p>
			</div>
			</a>
		</li>
	</ul>
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
<?php echo $this->element('footer_mobile'); ?>