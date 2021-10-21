
$(document).ready(function() {
$("ul#ticker01").liScroll();
$("ul#ticker02").liScroll();
$('.participez').click(function(){
$(this).css('cursor', 'hand');
window.location.href = "/events";
});



$('#petit').click(function(){
	
	$('#picbadge').attr('src','/img/badgesmall.jpg');
	$('#textbadges').text('<a href="http://www.<?php echo Configure::read('site.domain'); ?>"><img src="http://www.<?php echo Configure::read('site.domain'); ?>/img/badgesmall.jpg" alt="AmfineXchange"><\/a>');
	$('#linkimage').attr('href','http://www.<?php echo Configure::read('site.domain'); ?>/img/badgesmall.jpg');
});
$('#grand').click(function(){
		$('#picbadge').attr('src','/img/badgebig.jpg');
	$('#textbadges').text('<a href="http://www.<?php echo Configure::read('site.domain'); ?>"><img src="http://www.<?php echo Configure::read('site.domain'); ?>/img/badgebig.jpg" alt="AmfineXchange"><\/a>');
	$('#linkimage').attr('href','http://www.<?php echo Configure::read('site.domain'); ?>/img/badgebig.jpg');



});


$('#UserService').change(function(){
	var valeur = $('#UserService').attr('value');
	if(valeur == 7){
		$('.prec').css('display','block');
	}else{
		$('.prec').css('display','none');
	}

});





$('.de1').hover(function(){
$('a.v1').css('display','none');
$('a.v2').css('display','none');
$('a.v3').css('display','none');
$('a.v4').css('display','none');
$(' a.v1').css('display','block');
});

$('.de2').hover(function(){
$('a.v1').css('display','none');
$('a.v2').css('display','none');
$('a.v3').css('display','none');
$('a.v4').css('display','none');
$(' a.v2').css('display','block');
});


$('.de3').hover(function(){
$('a.v1').css('display','none');
$('a.v2').css('display','none');
$('a.v3').css('display','none');
$('a.v4').css('display','none');
$(' a.v3').css('display','block');
});



$('.but1').click(function(){
position = 1;
	$('.titre0').fadeIn();
	$('.titre1').css('display','none');
	$('.titre2').css('display','none');
	$('.titre3').css('display','none');
	$('.but1').addClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').removeClass('activeButton');
});



  
var position = 1;
$("body").everyTime(6000,function(i) {

position++;

	if(position == 5){
		position = 1;

	}
 if (position == 1){
 		$('.titre0').fadeIn();
	$('.titre1').css('display','none');
	$('.titre2').css('display','none');
	$('.titre3').css('display','none');
	$('.but1').addClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').removeClass('activeButton');
 }
  if (position == 2){
 		$('.titre0').css('display','none');
	$('.titre1').fadeIn();
	$('.titre2').css('display','none');
	$('.titre3').css('display','none');
	$('.but1').removeClass('activeButton');
	$('.but2').addClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').removeClass('activeButton');
 }

  if (position == 3){
 		$('.titre0').css('display','none');
	$('.titre1').css('display','none');
	$('.titre2').fadeIn();
	$('.titre3').css('display','none');
	$('.but1').removeClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').addClass('activeButton');
	$('.but4').removeClass('activeButton');
 }

  if (position == 4){
 		$('.titre0').css('display','none');
	$('.titre1').css('display','none');
	$('.titre2').css('display','none');
	$('.titre3').fadeIn();
	$('.but1').removeClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').addClass('activeButton');
 }
  
});


$('.but2').click(function(){
position = 2;
	$('.titre0').css('display','none');
	$('.titre1').fadeIn();
	$('.titre2').css('display','none');
	$('.titre3').css('display','none');
	$('.but1').removeClass('activeButton');
	$('.but2').addClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').removeClass('activeButton');
});
$('.but3').click(function(){
position = 3;
	$('.titre0').css('display','none');
	$('.titre1').css('display','none');
	$('.titre2').fadeIn();
	$('.titre3').css('display','none');
	$('.but1').removeClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').addClass('activeButton');
	$('.but4').removeClass('activeButton');
});
$('.but4').click(function(){
position = 4;
	$('.titre0').css('display','none');
	$('.titre1').css('display','none');
	$('.titre2').css('display','none');
	$('.titre3').fadeIn();
	$('.but1').removeClass('activeButton');
	$('.but2').removeClass('activeButton');
	$('.but3').removeClass('activeButton');
	$('.but4').addClass('activeButton');
});



<?php if(($topop == 1)): ?>
 $('#modal-from-dom2').modal('show');
<?php endif; ?>

$('.memberbg').hover(function(){
	var id = this.id;
		
var id2 = "#"+this.id;


	id = id.substr(8);
	$('.domy').attr('style','display:none;');
	var elementid = '#modal-from-domd'+id;
	var p =	$(id2);
var position = p.position();
var scrollTop = $("html").scrollTop();
$(elementid).css('position','absolute');
$(elementid).css('left',position.left + 350);
$(elementid).css('top',p.position().top -350 -  scrollTop/15);
	$(elementid).removeClass('hide');
	








},function(){
		var id = this.id;
	id = id.substr(8);
	$('.domy').attr('style','display:none;');
	var elementid = '#modal-from-domd'+id;

	$(elementid).addClass('hide');
});

$('#newnouv').change(function(){

	$.ajax({
   type: "POST",
   url: "/users/updatestatus",
   data: "partage="+$('#newnouv').attr('value'),
   success: function(msg){

 $('#modal-from-dom').modal('show');
   }
 });
});
	           $("a[rel=popover]")
                .popover({
                  offset: 10
                })
                .click(function(e) {
                  e.preventDefault()
                });

	$('#mask1').click(function(){
var cocher = $('#mask1').attr('class');
if(cocher == "masquer"){
$('#mask1').addClass('masquer2');
$('#mask1').removeClass('masquer');
$('#maskclubassociation').attr('value','1');
}
if(cocher == "masquer2"){
$('#mask1').addClass('masquer');
$('#mask1').removeClass('masquer2');
$('#maskclubassociation').attr('value','0');
}
	});
	$('#mask2').click(function(){
var cocher = $('#mask2').attr('class');
if(cocher == "masquer"){
$('#mask2').addClass('masquer2');
$('#mask2').removeClass('masquer');
$('#maskanniversaire').attr('value','1');
}
if(cocher == "masquer2"){
$('#mask2').addClass('masquer');
$('#mask2').removeClass('masquer2');
$('#maskanniversaire').attr('value','0');
}
	});
		$('#mask3').click(function(){
var cocher = $('#mask3').attr('class');
if(cocher == "masquer"){
$('#mask3').addClass('masquer2');
$('#mask3').removeClass('masquer');
$('#masktelmobile').attr('value','1');
}
if(cocher == "masquer2"){
$('#mask3').addClass('masquer');
$('#mask3').removeClass('masquer2');
$('#masktelmobile').attr('value','0');
}
	});
		$('#mask4').click(function(){
var cocher = $('#mask4').attr('class');
if(cocher == "masquer"){
$('#mask4').addClass('masquer2');
$('#mask4').removeClass('masquer');
$('#maskemail').attr('value','1');
}
if(cocher == "masquer2"){
$('#mask4').addClass('masquer');
$('#mask4').removeClass('masquer2');
$('#maskemail').attr('value','0');
}
	});
	$('#last1').click(function(){
	
		$('.pages').css('display','none');
		$('.forums').css('display','none');
		$('.users').css('display','none');
		$('.events').css('display','none');
		$('.pages').fadeIn();
	});
	$('#last2').click(function(){
	
		$('.pages').css('display','none');
		$('.forums').css('display','none');
		$('.users').css('display','none');
		$('.events').css('display','none');
		$('.forums').fadeIn();
	});
	$('#last3').click(function(){
	
		$('.pages').css('display','none');
		$('.forums').css('display','none');
		$('.users').css('display','none');
		$('.events').css('display','none');
		$('.users').fadeIn();
	});
	$('#last4').click(function(){
	
		$('.pages').css('display','none');
		$('.forums').css('display','none');
		$('.users').css('display','none');
		$('.events').css('display','none');
		$('.events').fadeIn();
	});




$('#UserService').change(function(){


if($('#UserService').attr('value') == "Autre, précisez"){
$('.prec').css('display','block');
	
}else{
$('.inputpre').attr('value','');
	
}
	
});






$('#blog1').change(function(){
	$('#blog2').attr('value',$('#blog1').attr('value'));
});
$('#blog2').change(function(){
	$('#blog1').attr('value',$('#blog2').attr('value'));
});
	$('#changeblog').click(function(){
		$('#blogf').css('display','none');
		$('#blogv').css('display','block');
	});
	<?php $ra =  'ren_'.time() ?>
  $('#uploadpic').uploadify({
    'uploader'  : '/uploadify/uploadify.swf',
    'script'    : '/uploadify/uploadify.php?rening=<?php echo $ra ?>',
    'cancelImg' : '/uploadify/cancel.png',
    'folder'    : '/uploads',
    'rening' : '<?php echo $ra ?>',
    'fileExt'     : '*.jpg;*.jpeg;*.png;*.gif;',
    'fileDesc'    : 'Fichiers Image *.jpg;*.jpeg;*.gif;*.png',
    'auto'      : true,
	'hideButton'   : true,
	'wmode'      : 'transparent',  

    'onComplete'  : function(event, ID, fileObj, response, data) {


 $.ajax({
   type: "POST",
   url: "/users/updatepic/<?php echo $ra ?>",
   data: "name="+fileObj.filePath,
   success: function(msg){

     $('.memberImg').attr('src','/uploads/<?php echo $ra ?>'+fileObj.filePath.replace("/uploads/","") );
   }
 });


    }                 

  });

$('#tips').twipsy();
});
