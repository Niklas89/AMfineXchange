<img style="width: 248px;"
	src="http://www.amfinexchange.com/logoemail.jpg" alt="" />
<br>

<p>
	Bonjour ,
	<?php echo $username; ?>
</p>
<P>
	Vous avez oublié le mot de passe associé à votre email
	<?php echo $email ?>
	et vous souhaitez en générer un automatiquement, cliquez sur le lien
	suivant :
	<?php echo $this->Html->link('Générer un mot de passe automatique',$this->Html->url($link,true)) ?>
</P>

<p>Si ce lien ne fonctionne pas, copiez et collez l'URL dans une
	nouvelle fenêtre de votre navigateur.</p>
<p>Pensez à le personnaliser dans la rubrique « Profil » de votre compte
	AMfineXchange.</p>

<p>
	Si vous avez reçu ce message alors qu'il ne vous était pas destiné,
	merci de ne pas tenir compte de ce message. <br>Si vous n'avez formulé
	aucune demande en ce sens, aucune action supplémentaire de votre part
	n'est nécessaire et vous pouvez ignorer ce message.
</p>

<p>
	Dans l’attente de vous lire, <br> Cordialement, <br> Bénédicte
	Marquetty <br> Community Manager AMfineXchange <br>
	bmarquetty@amfinexchange.com
</p>
