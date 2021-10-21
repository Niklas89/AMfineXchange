<?php $this->set('title_for_layout',strip_tags($event['Event']['theme'])); ?>
<div data-role="header" data-theme="a">
	<h1><?php echo strip_tags($event['Event']['date']); ?></h1>
	<?php echo $this->element('header_back_mobile'); ?>
</div><!-- /header -->
	
<div data-role="content" data-theme="d">



<div>
  <p style="font-size: 19px; font-weight: bold;">
    <?php echo $event['Event']['baseline'] ?>
  </p>
</div>
<div>
  <p>
    Date:
    <strong><?php echo $this->Formattext->date_fran2(strtotime($event['Event']['date'])) ?></strong>	
  </p>
</div>
<p class="organisteur">
  Organisé par « 
  <?php echo $event['Event']['organisateur'] ?>
   »
</p>
<p class="organisteur">
  Lieu : « 
  <?php echo $event['Event']['organise'] ?>
   »
</p>
<p class="participant">
  <?php echo $participants ?>
  Participants
</p>
<?php if (($me['User']['id'] == 20) || ($me['User']['id'] == 97)): ?>
<div class="participant">

  <?php foreach ($event['Participation'] as $k => $v): ?>
  <span class="personne" style="font-weight: bold"><a
    href="/users/profilvoir/<?php echo $v['User']['id'] ?>"><?php echo $v['User']['firstname']." ".$v['User']['lastname'] ?>
  </a> &nbsp;&nbsp;&nbsp;</span>
  <?php endforeach ?>
</div>
<?php endif ?>


  <?php if ($event['Event']['finished']==1): ?>
  <button class="btn primary compter" type="button"
    onClick="window.location.href='/events/showc/<?php echo $event['Event']['id'] ?>'">Compte
    rendu</button>
  <?php else: ?>

  <?php if ($jeparticipe == 1): ?>
  <button class="btn primary"
    style="margin-left: 77px; position: absolute; margin-top: 61px;"
    type="button"
    onClick="window.location.href='/events/participeno/<?php echo $event['Event']['id'] ?>'">Je
    n'y participerai pas</button>
  <?php else: ?>
  <button class="btn primary participe"
    style="margin-left: 134px; position: absolute; margin-top: 61px;"
    type="button"
    onClick="window.location.href='/events/participe/<?php echo $event['Event']['id'] ?>'">J'y
    participe</button>
  <?php endif ?>
  <?php endif ?>





<div class="blockevent">
  <h2>THEME</h2>
  <p class="theme">
    <?php echo $event['Event']['theme'] ?>
  </p>
</div>
<div class="blockevent">
  <h2>PRÉSENTATION</h2>
  <p class="theme">
    <?php echo $event['Event']['presentation'] ?>
  </p>
</div>

<div class="blockevent">
  <h2>PROGRAMME</h2>
  <p class="theme">
    <?php echo $event['Event']['programme'] ?>
  </p>
</div>


<div class="commentaire">
  
  <div class="ajouter">
  <!--  <button class="btn primary" type="button"
      onClick="window.location.href='event_addcomment/<?php echo $event['Event']['id'] ?>'">Ajouter
      un commentaire</button> -->
	  <?php echo $this->Html->link('Ajouter
      un commentaire', 'event_addcomment/'.$event['Event']['id'],array('data-theme'=>"d",'data-role'=>"button")); ?>
  </div>
  
  
  
      <?php echo count($event['Eventcomment']) ?>
      réactions à cet article
      

  <?php foreach ($comments as $k => $v): ?>

  <div class="news">

    <img src="<?php echo $v['User']['photo'] ?>" alt=""
      style="width: 47px; height: 47px;" />

    <div>

      <h2>
        Par
        <?php echo $v['User']['firstname']." ".$v['User']['lastname'] ?>
        le
        <?php echo $this->Formattext->date_fran2(strtotime($v['Eventcomment']['created'])) ?>
        à
        <?php echo date('H:i:s',strtotime($v['Eventcomment']['created'])) ?>
      </h2>

      <p>

        <?php echo $v['Eventcomment']['content'] ?>


      </p>

    </div>

  </div>
  <?php endforeach ?>




  


</div>




<?php if ($admin == 1): ?>
<div
  class="social">


  <!-- Start Shareaholic Sexybookmark HTML-->

  <div class="shr_class shareaholic-show-on-load"></div>

  <!-- End Shareaholic Sexybookmark HTML -->
  <!-- Start Shareaholic Sexybookmark script -->

  <script type="text/javascript">
var SHRSB_Settings = {"shr_class":{"src":"{Place_Path_Here}","link":"","service":"7,92,88","apikey":"6ffe2cbf142c45bd4cd03b01ec46b8658","localize":true,"shortener":"google","shortener_key":"","designer_toolTips":true,"twitter_template":"${title} - ${short_link} via @Shareaholic"}};
</script>

  <script type="text/javascript">
(function() {
var sb = document.createElement("script"); sb.type = "text/javascript";sb.async = true;
sb.src = ("https:" == document.location.protocol ? "https://dtym7iokkjlif.cloudfront.net" : "http://cdn.shareaholic.com") + "/media/js/jquery.shareaholic-publishers-sb.min.js";
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(sb, s);
})();
</script>
  <!-- End Shareaholic Sexybookmark script -->



</div>
<?php endif ?>

		
	

	
	


</div>
<?php echo $this->element('footer_mobile'); ?>