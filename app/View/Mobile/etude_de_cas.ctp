<?php $this->set('title_for_layout', 'Etude de cas'); ?>	
<div data-role="header" data-theme="a">
	<h1>Etudes de cas</h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
	<div data-role="content" data-theme="d">
		<ul data-role="listview" data-inset="true">
	<?php foreach ($pages as $k => $v): ?>
		<?php 
		if(!empty($v['Page']['miniature2'])){
			$v['Page']['miniature']=$v['Page']['miniature2'];
		}else{
			$v['Page']['miniature']='/img/'.$v['Page']['miniature'];
		}
		?>

	
		<li>
			<a href="pages_show/<?php echo $v['Page']['id'] ?>">
				<img src="<?php echo $v['Page']['miniature'] ?>" alt="<?php echo '/img/'.$v['Page']['id'] ?>" style="width: 80px; height: 80px;" />
				<h3><?php echo $this->Formattext->formattext($v['Page']['name'],60) ?></h3>
				<p>
					<?php echo $this->Formattext->date_fran2(strtotime($v['Page']['created'])) ?>,
					posté par <?php echo $v['User']['firstname'] ?> <?php echo $v['User']['lastname'] ?>,
					<?php echo count($v['Comment']) ?> commentaire<?php if(count($v['Comment'])>1) echo 's' ?>
				</p>
			</a>	
		</li>
		
				
		<?php endforeach ?>
	</ul>
		<div class="newsNavigation">


			<?php echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')); ?>

			<?php echo $this->Paginator->numbers(array('separator'=>false)); ?>
			<?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled next')); ?>

		</div>
	</div>
	
<?php echo $this->element('footer_mobile'); ?>