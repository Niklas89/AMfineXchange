<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>AmfineXchange | Login ou Inscription</title>
<?php echo $this->Html->css('login.css') ;

echo $this->Html->css('bootstrap');
?>

</head>
<body>

	<div id="container" class="content1">

		<img style="margin-top: 25px; margin-left: 176px;" id="toplogin"
			src="/img/log_in.png" />

<?php $this->requestAction('/pages/showfooter/92') ?>
		

		<img src="/img/log_in_03.gif" alt="line" />

		<?php echo $this->Session->flash(); ?>
		<div id="left">
			<p>
				Rejoindre AMfineXchange n'est soumis a aucune cotisation.<br /> <br />
				Il faut simplement &#234;tre &lt;adopt&#233;&gt; par les
				responsables <br /> d'AMfineXchange, Et participez aux &#233;changes
				!<br />

			</p>

			<div>
				<p>
					Pour vous inscrire <span><a
						style="color: #AE2732; font-weight: bold; text-align: left; font-size: 14px; position: absolute; margin-left: 20px; margin-top: 2px; font-size: 15px;"
						href="/users/signup">Cliquez-ici</a> </span> <a href="#">Voir les
						droits d'acc&#232;s</a>
				</p>
			</div>

		</div>

		<div id="right">

			<div class="first">
				<h3>Access Membre</h3>
			</div>
			<div class="second">
				<form action="/users/login" id="UserLoginForm" method="post"
					accept-charset="utf-8">
					<div style="display: none;">
						<input type="hidden" name="_method" value="POST">
					</div>
					<p>
						Adresse &#233;lectronique <input type="text"
							name="data[User][email]" />
					</p>
					<p style="padding-left: 43px;">
						Mot de passe <input type="password" name="data[User][password]" />
					</p>
					<p class="check">
						<input type="checkbox" id="checkbox" />Rester connect&#233; sur
						cet ordinateur
					</p>

					<p>
						<a href="/users/rappel">Mot de passe oubli&#233; ?</a>
					</p>
					<p>
						<button>Acc&#233;dez a AMfineXchange</button>
					</p>
				</form>
			</div>
		</div>

	</div>

</body>

</html>
