(function(){
		
	tinymce.create('tinymce.plugins.plugimages',{
		init: function(ed,url){
	ed.addCommand('open_img',function(){

		var el = ed.selection.getNode();
		var url = ed.settings.image_explorer;
		if(el.nodeName == 'IMG'){
		
			url=ed.settings.image_edit;
			url += '?src='+ed.dom.getAttrib(el,'src')+'&alt='+ed.dom.getAttrib(el,'alt')+'&class='+ed.dom.getAttrib(el,'class');
			
		}
		ed.windowManager.open({
			file:ed.settings.image_explorer,
			id:'image',
			width:1000,
			height:700,
			inline:true,
			title: 'Insérer un média'
		},{
			plugin_url:url
		});
	});		

	ed.addButton('visualaid',{
		title:'Insérer un média',
		cmd : 'open_img'
	});
		}




	});

	tinymce.PluginManager.add('plugimages',tinymce.plugins.plugimages);
})();