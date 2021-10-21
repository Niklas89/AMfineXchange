<?php $this->set('title_for_layout',"AmfineXchange | Mes relations"); ?>

<?php echo $this->element('left') ?>
<?php  $country = array(
		'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Columbia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivorie (Ivory Coast)', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic Of Congo (Zaire)', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France, Metropolitan', 'French Guinea', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard And McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'North Korea', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovak Republic', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And South Sandwich Islands', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis And Futuna Islands', 'Western Sahara', 'Western Samoa', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'
); ?>
<?php echo $this->Html->css('css/rel');     ?>


<LINK
	rel="stylesheet" type="text/css" href="/css/act.css">

<div id="mainRight">
	<?php echo $this->element('topprofil') ?>
	<?php echo $this->element('actionblock') ?>

	<div class="page-header">
		<button type="button"
			onClick="window.location.href='/users/membres?ajout=1';"
			class="btn primary">Ajouter des contacts</button>
	</div>
	<div class="contact" style="margin-left: 1px;">
		<?php echo $counting ?>
		contact(s)
	</div>

	<?php foreach ($relations as $k => $v): ?>

<div class="tkx">
	<div class="news">
		<div>
			<table style="width: 453px; margin-left: 87px; margin-left: 118px;">
				<tr>
					<td class="td1" style="width: 0;" rowspan="2"><a
						href="/users/profilvoir/<?php echo $v['Contact']['id'] ?>"> <img
							src="/image.php?width=47&amp;image=<?php echo $v['Contact']['photo'] ?>"
							alt=""
							style="margin-right: 10px; margin-left: 9px; margin-top: 3px; margin-bottom: 1px;" />

					</a></td>
					<td class="td1" style="width: 0;"><b><a
							href="/users/profilvoir/<?php echo $v['Contact']['id'] ?>"><?php echo $v['Contact']['firstname'].' '.$v['Contact']['lastname'] ?>
						</a> </b></td>
					<td class="td1 tdx" style="width: 0;"><a
						href="/users/messagerieenvoyer/<?php echo $v['Contact']['id'] ?>">envoyer
							un message</a></td>
				</tr>
				<tr>
					<td class="td1 td22" style="width: 0;"><?php if(!empty($v['Contact']['fonction'])){
						echo $v['Contact']['fonction'].', ';
					} ?> <?php if(!empty($v['Contact']['societe'])){
						echo $v['Contact']['societe'].', ';
					} ?> <?php if(!empty($v['Contact']['ville'])){
						echo $v['Contact']['ville'].', ';
					} ?> <?php if(!empty($v['Contact']['pays'])){
						echo $country[$v['Contact']['pays']].'';
					} ?>
					</td>
					<td class="td1 tdxx"><a
						href="/users/membres/?byid=<?php echo $v['Contact']['id'] ?>">Voir
							ses contact(s)</a></td>
				</tr>
			</table>
		</div>
	</div>
	</div>
	<?php endforeach ?>

	<div class="newsNavigation">


		<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

		<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
		<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

	</div>


	<br> <br> <br>


</div>
