
<?php  $country = array(
		'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Columbia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivorie (Ivory Coast)', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic Of Congo (Zaire)', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France, Metropolitan', 'French Guinea', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard And McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'North Korea', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovak Republic', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And South Sandwich Islands', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis And Futuna Islands', 'Western Sahara', 'Western Samoa', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'
); ?>
<?php $this->set('title_for_layout',"AmfineXchange | Editer mon profil"); ?>

<?php echo $this->element('left') ?>


<script type="text/javascript">
	$(document).ready(function() {
		$.datepicker.setDefaults($.datepicker.regional['fr']);
$('.datep').datepicker({
	dateFormat:"yy-mm-dd",changeYear: true,changeMonth: true,
	  minDate: "-100y", // it will set minDate from 25 October 2009
     showAnim: 'fold',
     yearRange: '1900:2000'

});
	});
</script>
<LINK
	rel="stylesheet" type="text/css" href="/css/edit.css">

<?php echo $this->Form->create('User') ?>
<div id="mainRight">
	<?php echo $this->element('topprofil') ?>

	<h2>
		<?php echo $me['User']['firstname'].' '.$me['User']['lastname'] ?>
	</h2>

	</script>
	<!--<p><a  href="#">modifier mes informations personnelles</a></p>-->

	<div id="blogf">
		<p>
			<span class="blog_membre">Blog:</span> <span class="address"><?php echo $me['User']['blog'] ?>
			</span> &nbsp;&nbsp;<a id="changeblog" href="#">modifier</a>
		</p>
	</div>
	<div id="blogv" style="display: none;">
		<p class="statut2">
			Blog
			<?php echo $this->Form->input('blog2',array('id'=>'blog1','label'=>false,'type'=>'text','div'=>false,'style'=>'    width: 204px;
					position: absolute;    margin-left: 10px;    margin-top: -1px;')); ?>
		
		
		<p id="rightPara">
			<button
				style="margin-top: -21px; position: absolute; margin-left: -103px; margin-left: -122px; margin-top: -20px;"
				id="editer" type="submit">Mettre à jour</button>
		</p>
		</p>
		<div style="clear: both;"></div>

	</div>

	<p id="rightPara">
		<button id="editer" type="button"
			onclick="window.location.href ='/users/profil/<?php echo $user_id ?>'; ">Voir
			mon profil</button>
	</p>
	<img src="/img/profil_contenu_26.gif" alt="line" id="line" />

	<form action="" method="post">
		<h1 class="formHeader">Vous</h1>
		<div class="formDiv">

			<p class="statut2">
				Fonction
				<?php echo $this->Form->input('fonction',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>
			<?php 
			$service=array('Légal / Juridique'=>'Légal / Juridique','Marketing / Communication'=>'Marketing / Communication','Informatique'=>'Informatique','Contrôle interne'=>'Contrôle interne','MOA'=>'MOA','Commercial'=>'Commercial','Direction générale'=>'Direction générale','Autre, précisez'=>'Autre, précisez');

			?>

			<p class="statut2">
				Service
				<?php echo $this->Form->select('service',$service,array('label'=>false,'style'=>'height: 22px;','type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>


			<span class="prec"
						 style="display: <?php if (in_array($this->request->data['User']['service'], $service)): ?>
						 	<?php echo "none;" ?>
						 <?php else: ?>
						 	<?php echo "block;" ?>
						 <?php endif; ?>">



				<p class="statut2">
					Précisez
					<?php echo $this->Form->input('service2',array('class'=>'inputpre','label'=>false,'type'=>'text','div'=>false,'value'=>$this->request->data['User']['service'])); ?>
				</p>
				<div style="clear: both;"></div>
			</span>

			<p class="statut2">
				Club/Associations
				<?php echo $this->Form->input('clubassociation',array('label'=>false,'type'=>'text','div'=>false)); ?>
				<span id="mask1"
					class="masquer<?php echo $actualuser['User']['maskclubassociation']?"2":""; ?>"
					style="left: 270px;">masquer</span>
			</p>
			<div style="clear: both;"></div>
			<?php echo $this->Form->input('maskclubassociation',array('id'=>'maskclubassociation','label'=>false,'type'=>'hidden','div'=>false)); ?>
			<?php echo $this->Form->input('maskanniversaire',array('id'=>'maskanniversaire','label'=>false,'type'=>'hidden','div'=>false)); ?>
			<?php echo $this->Form->input('masktelmobile',array('id'=>'masktelmobile','label'=>false,'type'=>'hidden','div'=>false)); ?>
			<?php echo $this->Form->input('maskemail',array('id'=>'maskemail','label'=>false,'type'=>'hidden','div'=>false)); ?>
			<p class="statut2">
				Pr&#233;sentation
				<?php echo $this->Form->input('presentation',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Centre d'int&#233;r&#234;ts dans<br /> AmfineXchange
				<?php echo $this->Form->input('centresinterets',array('label'=>false,'type'=>'text','div'=>false,'class'=>'fixInput')); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Sport
				<?php echo $this->Form->input('sport',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Culture &amp; Art
				<?php echo $this->Form->input('cultureart',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>
		</div>

		<h1 class="formHeader">Votre Societe</h1>
		<div class="formDiv">
			<p class="statut2">
				Nom de la société
				<?php echo $this->Form->input('societe',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>
			<p class="statut2">
				Ville
				<?php echo $this->Form->input('ville',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Pays
				<?php echo $this->Form->select('pays',$country,array('label'=>false,'style'=>'height: 22px;','type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Blog
				<?php echo $this->Form->input('blog',array('id'=>'blog2','label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Linked In
				<?php echo $this->Form->input('linkedin',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Viadeo
				<?php echo $this->Form->input('viadeo',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Twitter
				<?php echo $this->Form->input('twitter',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Facebook
				<?php echo $this->Form->input('facebook',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>


			<p class="statut2">
				Site Internet
				<?php echo $this->Form->input('site',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>
			<?php 

			$sect = array('Administrateur / dépositaire / valorisateur'=>'Administrateur / dépositaire / valorisateur','Administration'=>'Administration','Association'=>'Association','Assurance'=>'Assurance','Banque'=>'Banque','Banque privée'=>'Banque privée','Broker / Salle de marché'=>'Broker / Salle de marché','Consultant indépendant'=>'Consultant indépendant','Editeur de logiciels'=>'Editeur de logiciels','Fournisseur de services'=>'Fournisseur de services','Hébergeur'=>'Hébergeur','Intégrateur de systèmes'=>'Intégrateur de systèmes','Media'=>'Media','Formation'=>'Formation','Société d\'Audit'=>'Société d\'Audit','Société de conseil'=>'Société de conseil','Société de gestion (grande)'=>'Société de gestion (grande)','Société de gestion (moyenne)'=>'Société de gestion (moyenne)','Société de gestion (petite)'=>'Société de gestion (petite)','Autre, précisez'=>'Autre, précisez');


			?>
			<p class="statut2">
				Secteur d'activite
				<?php echo $this->Form->select('societesecreuractivite',$sect,array('label'=>false,'style'=>'height: 22px;','type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

		</div>

		<h1 class="formHeader">Info Pratique</h1>
		<div class="formDiv">
			<p class="statut2">
				Anniversaire
				<?php echo $this->Form->input('anniversaire',array('class'=>'datep','style'=>'    margin-top: 0;
						margin-bottom: 0;','label'=>false,'type'=>'text','div'=>false)); ?>
				<span id="mask2"
					class="masquer<?php echo $actualuser['User']['maskanniversaire']?"2":""; ?>">masquer</span>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				T&#233;l&#233;phone mobile
				<?php echo $this->Form->input('telmobile',array('label'=>false,'type'=>'text','div'=>false)); ?>
				<span id="mask3"
					class="masquer<?php echo $actualuser['User']['masktelmobile']?"2":""; ?>">masquer</span>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Email
				<?php echo $this->Form->input('email',array('label'=>false,'type'=>'text','div'=>false)); ?>
				<span id="mask4"
					class="masquer<?php echo $actualuser['User']['maskemail']?"2":""; ?>"
					style="left: 338px;">masquer</span>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Langues parl&#233;es
				<?php echo $this->Form->input('languesparlees',array('label'=>false,'type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>

			<p class="statut2">
				Partagé mes informations dans les infonews
				<?php echo $this->Form->select('sharename',array('0'=>'Non','1'=>'Oui'),array('label'=>false,'style'=>'height: 22px;','type'=>'text','div'=>false)); ?>
			</p>
			<div style="clear: both;"></div>
		</div>

		<?php echo $this->Form->submit('Mettre à jour mon profil', array('class' => 'input2 btn primary'));?>

		<?php echo $this->Form->end() ?>

</div>

