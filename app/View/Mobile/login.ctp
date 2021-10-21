<?php $this->set('title_for_layout', 'Login'); ?>	
		
<?php echo $this->Html->image('logo_amfinexchange.png', array('alt' => 'Logo AMfineXchange'))?>

<div data-role="fieldcontain" class="ui-hide-label" data-theme="a">
	<form action="/mobile/login" id="UserLoginForm" method="post"
		accept-charset="utf-8">
		<div style="display: none;">
			<input type="hidden" name="_method" value="POST">
		</div>
		<p>
			<input type="text" name="data[User][email]" placeholder="Adresse &#233;lectronique" data-theme ='c' />
		</p>
		<p>
			<input type="password" name="data[User][password]" placeholder="Mot de passe" data-theme ='c' />
		</p>
		<p class="check">
			<input type="checkbox" id="checkbox" data-theme ='c' />Rester connect&#233;
		</p>
		<p>
			<input type="submit" value="Se connecter" data-theme ='c' data-role='button' />
		</p>
		<p>
			<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'signup')); ?>" data-theme ='c' rel ='external' data-role='button'>
				S'inscrire
			</a>
		</p>
	</form>

</div> 