<div data-position="fixed" data-role="footer" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-overlay" role="contentinfo"><!-- style="top: -982px;"-->
	<div class="custom-icons ui-navbar" data-role="navbar" data-iconpos="top" role="navigation">
		<ul class="ui-grid-c">
			<li class="ui-block-a">
				<?php echo $this->Html->link("Accueil",array('controller'=>'mobile','action'=>'index'),array('class'=>'home','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a','data-iconpos'=>"top",'data-transition'=>"slide")); ?> 
			</li>
			<li class="ui-block-b">
				<?php echo $this->Html->link("Profil",array('controller'=>'mobile','action'=>'profil'),array('class'=>'profil','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-c">
				<?php echo $this->Html->link("Contact",array('controller'=>'mobile','action'=>'contact'),array('class'=>'contact','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
			<li class="ui-block-d">
				<?php echo $this->Html->link("Autres",array('controller'=>'mobile','action'=>'others'),array('class'=>'other','data-icon'=>'custom', 'rel'=>'external', 'data-theme'=>'a')); ?> 
			</li>
		</ul>
	</div>
</div> 