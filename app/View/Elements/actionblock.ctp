
<?php  $country = array(
		'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Columbia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivorie (Ivory Coast)', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic Of Congo (Zaire)', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France, Metropolitan', 'French Guinea', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard And McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'North Korea', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovak Republic', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And South Sandwich Islands', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis And Futuna Islands', 'Western Sahara', 'Western Samoa', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'
); ?>
<h2>
	<?php echo $me['User']['firstname'].' '.$me['User']['lastname'] ?>
</h2>
<p>
	<?php echo $me['User']['fonction'] ?>
	<?php if (!empty($me['User']['fonction'])): ?>
	,
	<?php endif ?>
	<?php echo $me['User']['societe'] ?>
</p>
<p>
	<?php echo $me['User']['ville'] ?>
	<?php if (!empty($me['User']['pays'])): ?>
	,
	<?php echo $country[$me['User']['pays']] ?>
	<?php endif ?>
</p>
<p>
	<span class="blog_membre">Blog:</span> <span class="address"><?php echo $me['User']['blog'] ?>
	</span>
</p>
<p>
	<span class="blog_membre">Membre:</span>
	<?php echo $me['User']['membership'] ?>
</p>


<p id="rightPara1">
	<button type="button" id="editer"
		onclick="window.location.href ='/users/edit'; ">Editer mon profil</button>
</p>
<p id="rightPara2">
	<button type="button" id="editer2"
		onclick="window.location.href ='/users/pass'; ">Changer mon mot de
		passe</button>
</p>


<?php echo $this->element('partager') ?>