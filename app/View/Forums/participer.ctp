
<?php $this->set('title_for_layout',"AmfineXchange | Participer"); ?>
<LINK
	rel="stylesheet" type="text/css" href="/css/part3.css">


<div id="mainRight">
	<?php echo $this->element('partager'); ?>
	<div class="page-header">
		<h1>Titre</h1>
	</div>

	<div class="search">
		<?php echo $this->Form->input('text',array('label'=>false,'value'=>'rechercher')); ?>
	</div>
	<div class="barre">
		<button class="btn primary">Repondre</button>
		<div class="pagi">XX messages . Page X sur X .</div>
	</div>


	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id
		dui non arcu faucibus hendrerit. Fusce vel libero id quam volutpat
		ornare. Aliquam erat volutpat. Vivamus semper ultrices placerat.
		Mauris sed orci. Sed euismod facilisis faucibus. Curabitur lacinia
		nunc id tortor semper convallis. Aenean pretium luctus metus,</p>



	<div class="news">



		<div>

			<table>
				<tr>
					<td>De Michael Priem . 10 octobre 2011, 15h02</td>
					<td class="tdd">Michael Priem</td>
					<td rowspan="2"><img src="/img/2011/12/koala.jpg" alt=""
						style="width: 47px; height: 47px;" /></td>
				</tr>
				<tr>
					<td>erat volutpat. Vivamus semper ultrices placerat. Mauris sed
						orci. Sed euismod facilisis faucibus. Curabitur lacinia nunc id
						tortor semper convallis. Aenean pretium luctus metus,</td>
					<td class="tdd">CEO AM fine</td>

				</tr>
			</table>

		</div>



	</div>


	<button class="btn primary">Repondre</button>
	<button class="btn primary">Suivante</button>


</div>




