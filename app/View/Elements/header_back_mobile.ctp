<?php 
	echo $this->Html->link("Message",
				array('controller'=>'mobile','action'=>'messagerie'),
				array('class'=>'message ui-btn-right','data-icon'=>'custom', 'rel'=>'external','data-theme'=>'c','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
				));
				
	echo $this->Html->link("Retour",
				array('controller'=>'mobile','action'=>'index'),
				array('class'=>'ui-btn-left', 'rel'=>'external','data-theme'=>'a','data-transition'=>"slide","data-rel"=>"back", "data-mini"=>"true" 
				));
?>