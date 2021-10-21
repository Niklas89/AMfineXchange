<div class="specific1">

<div class="page-header">
    <h1>
        <?php echo $spe ?>
    </h1>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {

function vide(){
     $('.actu').css('display','none');
     $('.docu').css('display','none');
     $('.event').css('display','none');
     $('.actuu').css('display','none');
     $('.docuu').css('display','none');
     $('.eventu').css('display','none');
     $('.actul').css('display','none');
     $('.docul').css('display','none');
     $('.eventl').css('display','none');
}

 $('.actuclick').click(function(){
     vide();
     $('.actu').fadeIn();
 });
 $('.docuclick').click(function(){
     vide();
     $('.docu').fadeIn();
 });
  $('.eventclick').click(function(){
     vide();
     $('.event').fadeIn();
 });





 $('.actulclick').click(function(){
     vide();
     $('.actul').fadeIn();
 });
 $('.doculclick').click(function(){
     vide();
     $('.docul').fadeIn();
 });
  $('.eventlclick').click(function(){
     vide();
     $('.eventl').fadeIn();
 });




 $('.actuuclick').click(function(){
     vide();
     $('.actuu').fadeIn();
 });
 $('.docuuclick').click(function(){
     vide();
     $('.docuu').fadeIn();
 });
  $('.eventuclick').click(function(){
     vide();
     $('.eventu').fadeIn();
 });





});
</script>

<div class="block b1">
    <div class="tit">
        <a href="#" class="primary2 col">SOLUTIONS, Soft & Services</a>
    </div>
    <div class="grey">
        <?php echo $product['Product']['i1'] ?>
    </div>
    <ul class="uu">
        <li><a href="/pages/show/<?php echo $product['Product']['p1_id'] ?>">Produits</a>
        </li>
        <li><a href="/pages/show/<?php echo $product['Product']['p2_id'] ?>">Services</a>
        </li>
        <li><a href="/pages/show/<?php echo $product['Product']['p3_id'] ?>">Bénéfices</a>
        </li>
        <li><a href="/pages/show/<?php echo $product['Product']['p4_id'] ?>">Best
                Practices</a></li>
    </ul>
</div>



<div class="block b2">
    <div class="tit">
        <a href="#" class="primary2 col">A LA UNE</a>
    </div>
    <div class="grey">
        <?php echo $product['Product']['i2'] ?>
    </div>
    <ul class="uu">
        <li><a class="actuclick" href="#">Actualité</a></li>

        <li>
            <div class="actu" style="display: none;">
                <ul>
                    <?php foreach ($uneactualite as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>

        <li><a class="docuclick" href="#">Documents</a></li>
        <li>
            <div class="docu" style="display: none;">
                <ul>
                    <?php foreach ($unedocument as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
        <li><a class="eventclick" href="#">Evènements & dates à retenir</a></li>
        <li>
            <div class="event" style="display: none;">
                <ul>
                    <?php foreach ($uneevenement as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $this->Formattext->date_fran2(strtotime($v['Event']['date'])) ?>
                            - <?php echo $v['Event']['baseline'] ?> </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
    </ul>
</div>


<div class="block b3">
    <div class="tit">
        <a href="#" class="primary2 col">DISCUSSIONS</a>
    </div>
    <div class="grey">
        <?php echo $product['Product']['i3'] ?>
    </div>
    <ul class="uu">
        <?php foreach ($forumsall as $k => $v): ?>
        <li><a href="/forums/show/<?php echo $v['Forumsujet']['id'] ?>"><?php echo $v['Forumsujet']['sujet'] ?>
        </a></li>
        <?php endforeach ?>
    </ul>
</div>


<div class="block b4">
    <div class="tit">
        <a href="#" class="primary2 col">LEGAL ROOM</a>
    </div>
    <div class="grey">
        <?php echo $product['Product']['i5'] ?>
    </div>
    <ul class="uu">
        <li><a class="actulclick" href="#">Actualité</a></li>

        <li>
            <div class="actul" style="display: none;">
                <ul>
                    <?php foreach ($uneactualitel as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>

        <li><a class="doculclick" href="#">Documents</a></li>
        <li>
            <div class="docul" style="display: none;">
                <ul>
                    <?php foreach ($unedocumentl as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
        <li><a class="eventlclick" href="#">Evènements & dates à retenir</a></li>
        <li>
            <div class="eventl" style="display: none;">
                <ul>
                    <?php foreach ($uneevenementl as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $this->Formattext->date_fran2(strtotime($v['Event']['date'])) ?>
                            - <?php echo $v['Event']['baseline'] ?> </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
    </ul>
</div>

<div class="block b5">
    <div class="businessd" style="color:<?php echo $col ?>">BUSINESS DATING</div>
    <p>Envie d’une présentation en one to one ?</p>
    <p>
        <a href="/contacts">Nous contacter</a>
    </p>
</div>

<div class="block b6">
    <div class="tit">
        <a href="#" class="primary2 col">USER CLUB</a>
    </div>
    <div class="grey">
        <?php echo $product['Product']['i6'] ?>
    </div>
    <ul class="uu">
        <li><a class="actuuclick" href="#">Actualité</a></li>

        <li>
            <div class="actuu" style="display: none;">
                <ul>
                    <?php foreach ($uneactualiteu as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>

        <li><a class="docuuclick" href="#">Documents</a></li>
        <li>
            <div class="docuu" style="display: none;">
                <ul>
                    <?php foreach ($unedocumentu as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/pages/show/<?php echo $v['Page']['id'] ?>"><?php echo $v['Page']['name'] ?>
                    </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
        <li><a class="eventuclick" href="#">Evènements & dates à retenir</a></li>
        <li>
            <div class="eventu" style="display: none;">
                <ul>
                    <?php foreach ($uneevenementu as $k => $v): ?>
                    <li class="gris"><a style="color: #9e9e9e"
                        href="/events/show/<?php echo $v['Event']['id'] ?>"><?php echo $this->Formattext->date_fran2(strtotime($v['Event']['date'])) ?>
                            - <?php echo $v['Event']['baseline'] ?> </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
    </ul>
</div>

<div class="block b7">
    <div class="titz">
        <a href="/pages/show/<?php echo $product['Product']['p7_id'] ?>"
            class="primary2 xr col">PARTENAIRE</a>
    </div>
    <div class="greyz">
        <?php echo $product['Product']['i4'] ?>
    </div>

</div>


</div>