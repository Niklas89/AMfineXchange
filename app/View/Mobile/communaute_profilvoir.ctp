<?php $this->set('title_for_layout',"AmfineXchange | Profil public de $nomcomplet"); ?>
<div data-role="header" data-theme="a">
		<h1>Etude de cas | AmFineXchange</h1>
		<?php echo $this->Html->link("Message",
								array('controller'=>'mobile','action'=>'index'),
								array('class'=>'header ui-btn-right','data-icon'=>'custom', 'rel'=>'external', 					'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
					    ));
		?>
	</div><!-- /header -->
	
<div data-role="content" data-theme="d">

<?php $nomcomplet = $user['User']['firstname'].' '.$user['User']['lastname']; ?>
<?php  $country = array(
		'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Columbia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivorie (Ivory Coast)', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic Of Congo (Zaire)', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France, Metropolitan', 'French Guinea', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard And McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'North Korea', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovak Republic', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And South Sandwich Islands', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis And Futuna Islands', 'Western Sahara', 'Western Samoa', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'
); ?>


<?php echo $this->element('left2') ?>

<div id="mainRight" class="krk">
	<?php echo $this->element('topprofil') ?>

	<h2>
		<?php echo $user['User']['firstname'].' '.$user['User']['lastname'] ?>
	</h2>
	<p>
		<?php echo $user['User']['fonction'] ?>
		<?php if (!empty($user['User']['fonction'])): ?>
		,
		<?php endif ?>
		<?php echo $user['User']['societe'] ?>
	</p>
	<p>
		<?php echo $user['User']['ville'] ?>
		<?php if (!empty($user['User']['pays'])): ?>
		,
		<?php echo $country[$user['User']['pays']] ?>
		<?php endif ?>
	</p>
	<p>
		<span class="blog_membre">Blog:</span> <span class="address"><?php echo $user['User']['blog'] ?>
		</span>
	</p>
	<p>
		<span class="blog_membre">Membre:</span>
		<?php echo $user['User']['membership'] ?>
	</p>


	<h1 style="margin-top: 3px; padding-top: 3px;">Vous</h1>
	<div>
		<p class="statut">Statut</p>
		<span class="x"><?php echo $user['User']['statut'] ?> </span>
	</div>
	<div>
		<p class="statut">Membership</p>
		<span class="x"><?php echo $user['User']['membership'] ?> </span>
	</div>
	<div>
		<p class="statut">Pr&#233;sentation</p>
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
	</div>
	<div style="clear: both;"></div>
	<h1 style="margin-top: 3px; padding-top: 3px;">Votre Societe</h1>
	<div>
		<p class="statut">Site Internet</p>
		<span class="x"><?php echo $user['User']['site'] ?> </span>
	</div>
	<div>
		<p class="statut">Secteur d'activite</p>
		<span class="x"><?php echo $user['User']['societesecreuractivite'] ?>
		</span>
	</div>
	<div>
		<p class="statut">R&#233;seaux sociaux</p>
		<span class="x"><?php echo $user['User']['societereseauxsociaux'] ?> </span>
	</div>
	<div style="clear: both;"></div>
	<h1 style="margin-top: 3px; padding-top: 3px;">Info Pratique</h1>
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
	<div class="well" style="margin-top: 36px;">
		<button style="float: right; margin-top: 0;" class="btn primary"
			type="button"
			onClick="window.location.href
			='/users/contactadd/<?php echo $user['User']['id'] ?>'">Ajouter en
			contact</button>
	</div>
</div>

	
</div>
<div data-position="fixed" data-role="footer" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-overlay" role="contentinfo" style="top: -982px;">
	<div class="custom-icons ui-navbar" data-role="navbar" role="navigation">
		<ul class="ui-grid-c">
			<li class="ui-block-a">
				<?php echo $this->Html->link("Accueil",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide")); ?> 
			</li>
			<li class="ui-block-b">
				<?php echo $this->Html->link("Profil",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-c">
				<?php echo $this->Html->link("Contact",array('controller'=>'mobile','action'=>'index'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-d">
				<?php echo $this->Html->link("Autres",array('controller'=>'mobile','action'=>'others'),array('class'=>'actus','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a','data-transition'=>"slide")); ?> 
			</li>
		</ul>
	</div>
</div>