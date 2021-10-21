
<ul id="contentRightMenu">
	<li
	<?php if($this->request->params['action'] == "profil") echo ' class="activeRightMenu" ' ?>><?php echo $this->Html->link("Profil",array('action'=>'profil')); ?>
	</li>
	<li
	<?php if($this->request->params['action'] == "messagerie") echo ' class="activeRightMenu" ' ?>><?php echo $this->Html->link("Messagerie",array('action'=>'messagerie')); ?>
	</li>
	<li
	<?php if($this->request->params['action'] == "relation") echo ' class="activeRightMenu" ' ?>><a
		href="/users/relation">Contacts</a></li>
	<li
	<?php if($this->request->params['action'] == "activity") echo ' class="activeRightMenu" ' ?>><?php echo $this->Html->link("Activités",array('action'=>'activity')); ?>
	</li>
	<li
	<?php if($this->request->params['action'] == "visites") echo ' class="activeRightMenu" ' ?>><?php echo $this->Html->link("Visites",array('action'=>'visites')); ?>
	</li>
</ul>
