/**
 * @author Paul Chan / KF Software House
 * http://www.kfsoft.info
 * Modified by Aleksey Kuznetsov (AK) at 2011/10/14  
 *
 * Version 0.6
 * Copyright (c) 2011 KF Software House
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */

(function($) {

    var _options = new Array();
	var _optionsMenuLength = new Array();
	var timeoutId = 0;
	
	jQuery.fn.MyDropdown = function(options) {
		_options[_options.length] = $.extend({}, $.fn.MyDropdown.defaults, options);
		_optionsMenuLength[_options.length] = 0;
		var idx = _options.length-1;
		var opt = _options[idx];
		$(this).attr("idx", idx);
		
		$(this).each(function(){
			var selectmenu = $(this);
			var menuoptions = selectmenu.find("option");
			var val;
			var genMenu = "";

			_optionsMenuLength[idx] = menuoptions.length;
			
			for (var i=0;i!=menuoptions.length;i++)
			{
				val = menuoptions[i].value;
				txt = menuoptions[i].text;
				genMenu += "<LI v=" + val +">" + txt; 
			}
			
			if (menuoptions.length>0)
				genMenu = "<UL class='advMenuUL advMenuUL"+idx+"'>" + genMenu + "</UL>";
			else
				genMenu = "";
			
			var genHeader = "<DIV class='genHeader genHeader"+idx+"'>SELECT</DIV>";
	
			if (!opt.bDebug)
				selectmenu.hide();
				
			selectmenu.after(genHeader + genMenu);
			
			$(".advMenuUL"+idx).addClass("menuHeader").addClass("menuHeader"+idx);
			
			$(".genHeader"+idx).click(function(){
			
				// AK --
				var selectedv = $(selectmenu).val()
				$('.advMenuUL li').each(function(){
					var v = $(this).attr('v');
					if (v==selectedv)
						this.className = 'sel';
				});
			
				$(".menuHeader"+idx).css("height", _optionsMenuLength[idx] * opt.lineHeight);
				$(".menuHeader"+idx).toggle(); //AK
				
			}).mouseleave(function(){

				$(".menuHeader"+idx).css("height", opt.lineHeight+"px");
				timeoutId = setTimeout(function(){
					$(".menuHeader"+idx).hide();
				},10);
			});
			
			// AK --
			$(".advMenuUL"+idx+" li").mouseover(function(){
				$('.advMenuUL li').each(function(){
					this.className = '';
				});
			});			
			

			$(".menuHeader"+idx).mouseenter(function(){
				$(this).css("height", _optionsMenuLength[idx] * opt.lineHeight);
				clearTimeout(timeoutId);
			});			

			$(".menuHeader"+idx).mouseleave(function(){
				$(this).css("height", opt.lineHeight+"px");
				$(this).hide();
			});
			
			$(".advMenuUL"+idx+" LI").click(function(){
				$(".genHeader"+idx).html($(this).text());
				var v = $(this).attr("v");
				$(selectmenu).children().each(function(){ 
					if ($(this).val()==v)
						this.selected = true;
				});
				
				$(selectmenu).trigger('change');  //Added by Hugh Wormington
				
				//hide item
				$(".menuHeader"+idx).hide();
			});
			
			$(".advMenuUL").hide();
			
			//init select
			$(selectmenu).children().each(function(){
				if (this.selected)
				{
					var selectedv =  $(this).val();
					var selectedt = $(this).text();
					
					$(".advMenuUL LI").each(function(){
						var v = $(this).attr("v");
						if (v==selectedv)
						{
							$(".genHeader"+idx).html(selectedt);
						}
					});
				}
			});
		});
		
	}
	
	//default values
	jQuery.fn.MyDropdown.defaults = {
		bDebug:false,
		lineHeight:30
	};	
})(jQuery);