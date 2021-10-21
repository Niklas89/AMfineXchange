
<LINK
	rel="stylesheet" type="text/css" href="/css/info.css">

<?php $this->set('title_for_layout',"AmfineXchange | Mes infonews"); ?>

<div id="mainRight">

	<?php echo $this->Form->create('Infonews',array('url'=>'/users/infonews/')) ?>

	<div class="textinfonews">
		<img src="/img/log_in.png" />
		<p>AMfineXchange vous propose de recevoir les informations liées à la
			plateforme directement sur vos emails ou via des notifications SMS.</p>

		<p>Vous restez maître de l’information que vous souhaitez, à la
			fréquence désirée et sur le vecteur de votre choix.</p>

		<p>Le tableau ci-dessous vous permet de configurer et de personnaliser
			la réception de vos news.</p>



		<p>Sélectionnez les informations que vous souhaitez recevoir et leur
			fréquence dans le tableau par simple clic.</p>
		<p>Une fois que vous aurez validé vos choix vous recevrez un email de
			confirmation.</p>

	</div>
	<table>
		<tr>
			<td></td>
			<td></td>


			<td colspan="4"><u>PAR EMAIL</u></td>
			<td class="tdsms"><u>PAR SMS</u></td>
		</tr>
		<tr>
			<td>FAMILLE</td>
			<td>INFORMATION</td>
			<td>1x par semaine</td>
			<td>2x par mois</td>
			<td>1x par mois</td>
			<td>1x tous les deux mois</td>
			<td class="tdsms">1x par semaine</td>
		</tr>
		<tr>
			<td><strong>Communauté</strong></td>
			<td>Les nouveaux membres</td>


			<td><input type="radio" name="data[Infonews][l1s2]" value="1"
			<?php if($this->request->data['Infonew']['l1s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l1s2]" value="2"
			<?php if($this->request->data['Infonew']['l1s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l1s2]" value="3"
			<?php if($this->request->data['Infonew']['l1s2'] == "3") echo ' checked="checked" ';?>>
			</td>


			<td><input type="radio" name="data[Infonews][l1s2]" value="4"
			<?php if($this->request->data['Infonew']['l1s2'] == "4") echo ' checked="checked" ';?>>
			</td>

			<td class="tdsms"><input type="checkbox"
				name="data[Infonews][smsmembers]" value="1"
				<?php if($this->request->data['Infonew']['smsmembers'] == "1") echo ' checked="checked" ';?>>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>L'activité de ses contacts</td>


			<td><input type="radio" name="data[Infonews][l2s2]" value="1"
			<?php if($this->request->data['Infonew']['l2s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l2s2]" value="2"
			<?php if($this->request->data['Infonew']['l2s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l2s2]" value="3"
			<?php if($this->request->data['Infonew']['l2s2'] == "3") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l2s2]" value="4"
			<?php if($this->request->data['Infonew']['l2s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td></td>
			<td>Les nouveaux partenaires</td>


			<td><input type="radio" name="data[Infonews][l3s2]" value="1"
			<?php if($this->request->data['Infonew']['l3s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l3s2]" value="2"
			<?php if($this->request->data['Infonew']['l3s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l3s2]" value="3"
			<?php if($this->request->data['Infonew']['l3s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l3s2]" value="4"
			<?php if($this->request->data['Infonew']['l3s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td></td>
			<td>L'activité de ses partenaires</td>


			<td><input type="radio" name="data[Infonews][l4s2]" value="1"
			<?php if($this->request->data['Infonew']['l4s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l4s2]" value="2"
			<?php if($this->request->data['Infonew']['l4s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l4s2]" value="3"
			<?php if($this->request->data['Infonew']['l4s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l4s2]" value="4"
			<?php if($this->request->data['Infonew']['l4s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td><strong>Evènement</strong></td>
			<td>Les prochains évènements</td>


			<td><input type="radio" name="data[Infonews][l5s2]" value="1"
			<?php if($this->request->data['Infonew']['l5s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l5s2]" value="2"
			<?php if($this->request->data['Infonew']['l5s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l5s2]" value="3"
			<?php if($this->request->data['Infonew']['l5s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l5s2]" value="4"
			<?php if($this->request->data['Infonew']['l5s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"><input type="checkbox"
				name="data[Infonews][smsevent]" value="1"
				<?php if($this->request->data['Infonew']['smsevent'] == "1") echo ' checked="checked" ';?>>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Le compte rendu des évènements</td>


			<td><input type="radio" name="data[Infonews][l6s2]" value="1"
			<?php if($this->request->data['Infonew']['l6s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l6s2]" value="2"
			<?php if($this->request->data['Infonew']['l6s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l6s2]" value="3"
			<?php if($this->request->data['Infonew']['l6s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l6s2]" value="4"
			<?php if($this->request->data['Infonew']['l6s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td><strong>Information</strong></td>
			<td>Les nouveaux posts (articles, vidéos)</td>

			<td><input type="radio" name="data[Infonews][l7s2]" value="1"
			<?php if($this->request->data['Infonew']['l7s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l7s2]" value="2"
			<?php if($this->request->data['Infonew']['l7s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l7s2]" value="3"
			<?php if($this->request->data['Infonew']['l7s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l7s2]" value="4"
			<?php if($this->request->data['Infonew']['l7s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<!--
<tr>
	<td></td>
	<td>Uniquement les thèmes que je suis</td>


<td>

<input type="radio" name="data[Infonews][l8s2]" value="1"
<?php if($this->request->data['Infonew']['l8s2'] == "1") echo ' checked="checked" ';?>
 >
</td>

<td>

<input type="radio" name="data[Infonews][l8s2]" value="2"
<?php if($this->request->data['Infonew']['l8s2'] == "2") echo ' checked="checked" ';?>
 >
</td>

<td>

<input type="radio" name="data[Infonews][l8s2]" value="3"
<?php if($this->request->data['Infonew']['l8s2'] == "3") echo ' checked="checked" ';?>
 >
</td>
<td>

<input type="radio" name="data[Infonews][l8s2]" value="4"
<?php if($this->request->data['Infonew']['l8s2'] == "4") echo ' checked="checked" ';?>
 >
</td><td class="tdsms"></td>
</tr>
-->
		<tr>
			<td><strong>Discussions</strong></td>
			<td>Les nouvelles discussions</td>


			<td><input type="radio" name="data[Infonews][l9s2]" value="1"
			<?php if($this->request->data['Infonew']['l9s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l9s2]" value="2"
			<?php if($this->request->data['Infonew']['l9s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l9s2]" value="3"
			<?php if($this->request->data['Infonew']['l9s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l9s2]" value="4"
			<?php if($this->request->data['Infonew']['l9s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td></td>
			<td>Les nouveaux messages</td>


			<td><input type="radio" name="data[Infonews][l10s2]" value="1"
			<?php if($this->request->data['Infonew']['l10s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l10s2]" value="2"
			<?php if($this->request->data['Infonew']['l10s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l10s2]" value="3"
			<?php if($this->request->data['Infonew']['l10s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l10s2]" value="4"
			<?php if($this->request->data['Infonew']['l10s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<tr>
			<td></td>
			<td>Uniquement sur les discussions auxquelles je participe</td>


			<td><input type="radio" name="data[Infonews][l11s2]" value="1"
			<?php if($this->request->data['Infonew']['l11s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l11s2]" value="2"
			<?php if($this->request->data['Infonew']['l11s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l11s2]" value="3"
			<?php if($this->request->data['Infonew']['l11s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l11s2]" value="4"
			<?php if($this->request->data['Infonew']['l11s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>
		<!--
<tr>
	<td></td>
	<td>Uniquement les discussions que je suis</td>
	

<td>

<input type="radio" name="data[Infonews][l12s2]" value="1"
<?php if($this->request->data['Infonew']['l12s2'] == "1") echo ' checked="checked" ';?>
 >
</td>

<td>

<input type="radio" name="data[Infonews][l12s2]" value="2"
<?php if($this->request->data['Infonew']['l12s2'] == "2") echo ' checked="checked" ';?>
 >
</td>

<td>

<input type="radio" name="data[Infonews][l12s2]" value="3"
<?php if($this->request->data['Infonew']['l12s2'] == "3") echo ' checked="checked" ';?>
 >
</td>
<td>

<input type="radio" name="data[Infonews][l12s2]" value="4"
<?php if($this->request->data['Infonew']['l12s2'] == "4") echo ' checked="checked" ';?>
 >
</td><td class="tdsms"></td>
</tr>
-->
		<tr>
			<td><strong>Qui a visité mon profil</strong></td>
			<td>Les récentes visites</td>

			<td><input type="radio" name="data[Infonews][l13s2]" value="1"
			<?php if($this->request->data['Infonew']['l13s2'] == "1") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l13s2]" value="2"
			<?php if($this->request->data['Infonew']['l13s2'] == "2") echo ' checked="checked" ';?>>
			</td>

			<td><input type="radio" name="data[Infonews][l13s2]" value="3"
			<?php if($this->request->data['Infonew']['l13s2'] == "3") echo ' checked="checked" ';?>>
			</td>
			<td><input type="radio" name="data[Infonews][l13s2]" value="4"
			<?php if($this->request->data['Infonew']['l13s2'] == "4") echo ' checked="checked" ';?>>
			</td>
			<td class="tdsms"></td>
		</tr>

	</table>

	<?php echo $this->Form->input('id',array('type'=>'hidden','value'=>$this->request->data['Infonew']['id']),array('type'=>'hidden')); ?>
	<div class="well">
		<button class="btn primary">Envoyer</button>
	</div>

	<?php echo $this->Form->end() ?>



</div>
