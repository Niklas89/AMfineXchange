<?php $nomcomplet = $user['User']['firstname'].' '.$user['User']['lastname']; ?>
<?php $this->set('title_for_layout',"Profil public de $nomcomplet"); ?>
<div data-role="header" data-theme="a">
	<h1>Profil public de <?php echo $nomcomplet; ?></h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">

<?php  $country = array(
		'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Columbia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivorie (Ivory Coast)', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic Of Congo (Zaire)', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France, Metropolitan', 'French Guinea', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard And McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'North Korea', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovak Republic', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And South Sandwich Islands', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis And Futuna Islands', 'Western Sahara', 'Western Samoa', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'
); ?>

	<div class="well" style="margin-top: 36px;">
		<button style="float: right; margin-top: 0;" class="btn primary"
			type="button"
			onClick="window.location.href
			='/users/contactadd/<?php echo $user['User']['id'] ?>'">Ajouter en
			contact</button>
	</div>
<div style="float:left;">
	<?php if(isset($user['User']['photo'])){
		$photo = $user['User']['photo'];
	}else{
		// $photo = "/img/personne.jpg";
		$photo = "nophoto.jpg";
	} ?>
	<!-- <img src="<?php echo $photo ?>" alt="member" class="memberImg" /> -->
	<?php echo $this->Html->image($photo, array('alt' => $user['User']['username'])); ?>
</div>

<div style="float:left;text-align:left;margin-left:20px;">


	<div>
		<p class="statut"><?php echo $user['User']['firstname'] ?> <?php echo $user['User']['lastname'] ?></p>
	</div>
	<div>
		<p class="statut">Profession: <?php echo $user['User']['fonction'] ?></p>
	</div>
	<div>
		<p class="statut">Membre: <?php echo $user['User']['membership'] ?></p>
	</div>
	<!-- <div>
		<p class="statut">Pr&#233;sentation</p>
	</div>
	<div class="prezy"
		style="margin-top: 18px; padding-top: 13px; padding-bottom: 6px; font-style: italic;">
		<span class="x2"><?php echo $this->Formattext->formattext($user['User']['presentation'],650) ?>
		</span>
	</div>
	<div>
		<p class="statut">Centre d'int&#233;r&#234;ts dans AmfineXchange</p>
		<span class="x"><?php echo $user['User']['centresinterets'] ?> </span>
	</div>
	<?php if ($user['User']['maskclubassociation'] == 1): ?>
	<div>
		<p class="statut">Club/Association</p>
		<span class="x"><?php echo $user['User']['clubassociation'] ?> </span>
	</div>
	<?php endif ?>
	<div>
		<p class="statut">Sport</p>
		<span class="x"><?php echo $user['User']['sport'] ?> </span>
	</div>
	<div>
		<p class="statut">Culture &amp; Art</p>
		<span class="x"><?php echo $user['User']['cultureart'] ?> </span>
	</div> -->
	</div>
	<div style="clear: both;"></div>
<div style="float:left;text-align:left;">
	<h2>Votre Societe</h2>

	<div>
		<p class="statut">Site Internet</p>
		<span class="x"><?php echo $user['User']['site'] ?> </span>
	</div>
	<div>
		<p class="statut">Secteur d'activite</p>
		<span class="x"><?php echo $user['User']['societesecreuractivite'] ?> </span>
	</div>
	<div>
		<p class="statut">R&#233;seaux sociaux</p>
		<span class="x"><?php echo $user['User']['societereseauxsociaux'] ?> </span>
	</div>
	<div style="clear: both;"></div>
	<h2>Info Pratique</h2>
	<?php if ($user['User']['maskanniversaire'] == 1): ?>
	<div>
		<p class="statut">Anniversaire</p>
		<span class="x"><?php echo $user['User']['anniversaire'] ?> </span>
	</div>
	<?php endif ?>
	<?php if ($user['User']['masktelmobile'] == 1): ?>
	<div>
		<p class="statut">T&#233;l&#233;phone mobile</p>
		<span class="x"><?php echo $user['User']['telmobile'] ?> </span>
	</div>
	<?php endif ?>
	<?php if ($user['User']['maskemail'] == 0): ?>
	<div>
		<p class="statut">Email</p>
		<span class="x"><?php echo $user['User']['email'] ?> </span>
	</div>
	<?php endif ?>

	<div>

		<div>
			<p class="statut">Langues parl&#233;es</p>
			<span class="x"><?php echo $user['User']['languesparlees'] ?> </span>
		</div>
	</div>


</div>
<?php echo $this->element('footer_mobile'); ?>