<?php $this->set('title_for_layout',"Liste des évènements"); ?>
<div data-role="header" data-theme="a">
	<h1>Liste des évènements</h1>
	<?php echo $this->Html->link("Message",
							array('controller'=>'mobile','action'=>'index'),
							array('class'=>'message ui-btn-right','data-icon'=>'custom', 'rel'=>'external','data-theme'=>'c','data-iconpos'=>"top",'data-transition'=>"slide",'data-iconpos'=>"notext"
					    ));
	?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">








	
	<?php echo $this->Html->link('Voir les prochains évènements', 'nextevents',array('data-theme'=>"d",'data-role'=>"button")); ?>
	<ul data-role="listview" data-inset="true">
	<?php foreach ($events as $k => $v): ?>
		<?php if ($v['Event']['finished'] == 1): ?>
		<li>
			<a title="<?php echo addslashes($v['Event']['baseline']) ?>" href="event_show/<?php echo addslashes($v['Event']['id']) ?>">
				<h3><?php echo addslashes($v['Event']['baseline']) ?></h3>
				<p>Date: <strong><?php echo addslashes($v['Event']['date']) ?></strong></p>
			</a>
		</li>
		<?php endif ?>
	<?php endforeach ?>
	</ul>
	
	<!-- d'après le Zoning
	<ul data-role="listview" data-inset="true"> 
	<?php foreach ($events as $k => $v): ?>
		<?php if ($v['Event']['finished'] == 1): ?>
		<li>
			<a title="<?php echo addslashes($v['Event']['baseline']) ?>" href="event_show/<?php echo addslashes($v['Event']['id']) ?>">
				<h3><?php echo addslashes($v['Event']['date']) ?></h3>
				<p><?php echo addslashes($v['Event']['baseline']) ?></p>
			</a>
		</li>
		<?php endif ?>
	<?php endforeach ?>
	</ul> -->
		
	

	
	


</div>
<?php echo $this->element('footer_mobile'); ?>