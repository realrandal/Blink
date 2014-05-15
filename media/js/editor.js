/**
 * Kunena Component
 * @package Kunena.Template.Crypsis
 *
 * @copyright (C) 2008 - 2013 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/

/*
 * Fix some Mootools bugs
 * 
 * provides: [Element.Forms]
 */

 

var __attachment_limit = 0;

function newAttachment() {
	if ( config_attachment_limit > 0 ) {
		if (__attachment_limit < config_attachment_limit) __attachment_limit++;
		else return false;
	}
	
	var __kattachment = document.id('kattachment-id');
	if (!__kattachment) return;
	__kattachment.setStyle('display', 'none');
	__kattachment.getElement('input').setProperty('value', '');
	
	var __id = __kattachment.retrieve('nextid',1);
	__kattachment.store('nextid',__id+1);
	var __file = __kattachment.clone().inject(__kattachment,'before').set('id','kattachment'+__id).setStyle('display');
	__file.getElement('span.kattachment-id-container').set('text', __id+'. ');
	var input = __file.getElement('input.kfile-input').set('name', 'kattachment'+__id).removeProperty('onchange');
	input.addEvent('change', function() {
		this.removeEvents('change');
		var __filename = this.get('value');
		if (__filename.lastIndexOf('\\') > -1) {
			__filename = __filename.substring(1 + __filename.lastIndexOf('\\'));
		}
		this.addEvent('change', function() {
			__file.getElement('input.kfile-input-textbox').set('value', __filename);
		});
		__file.getElement('input.kfile-input-textbox').set('value', __filename);
		
		__file.getElement('.kattachment-insert').removeProperty('style').addEvent('click', function() {kbbcode.focus().insert('\n[attachment:'+ __id +']'+ __filename +'[/attachment]\n', 'after', false); return false; } );
		__file.getElement('.kattachment-remove').removeProperty('style').addEvent('click', function() {__file.dispose(); return false; } );
		newAttachment();
	});
}

function bindAttachments() {
	var __kattachment = $$('.kattachment-old');
	if (!__kattachment) return;
	__kattachment.each(function(el) {
		el.getElement('.kattachment-insert').removeProperty('style').addEvent('click', function() {kbbcode.focus().insert('\n[attachment='+ el.getElement('input[type="checkbox"]').get('value') +']'+ el.getElement('.kfilename').get('text') +'[/attachment]\n', 'after', false); return false; } );
	});
}

// 
// Helper function for various IE7 and IE8 work arounds
//
function IEcompatibility() {
	// Only do anything if this is IE
	if(Browser.ie){
		var __fix = $$("#kbbcode-size-options", "#kbbcode-size-options span", 
						"#kbbcode-colortable", "#kbbcode-colortable td");
		if (__fix) {
			__fix.setProperty('unselectable', 'on');
		}
	}
}

//
// kInsertVideo()
//
// Helper function to insert the video bbcode into the message
//

//This selector can be re-used for the dropdwown list, to get the item selected easily
Slick.definePseudo(this, function(value){
	return (this.selected && this.get('tag') == 'option');
})

function kInsertVideo1() {
	var videosize = document.id('kvideosize').get('value');
//	if ( videosize == '') { NO DEFAULT
//		videosize = '100';
//	}
	var videowidth = document.id('kvideowidth').get('value');
	if ( videowidth == '') {
		videowidth = '425';
	}
	var videoheigth = document.id('kvideoheight').get('value');
	if ( videoheigth == '') {
		videoheigth = '344';
	}
	var provider = document.id('kvideoprovider').get('value');
	if ( provider == '') {
		provider = '';
	}
	var videoid = document.id('kvideoid').get('value');
	kbbcode.focus().insert( '[video'+(videosize ? ' size='+videosize:'')+' width='+videowidth+' height='+videoheigth+' type='+provider+']'+videoid+'[/video]', 'after', false);
	kToggleOrSwap("kbbcode-video-options");
}

function kInsertVideo2() {
	var videourl = document.id("kvideourl").get("value");
	kbbcode.focus().insert('[video]'+ videourl +'[/video]', 'after', false);
	kToggleOrSwap("kbbcode-video-options");
}

function kEditorInitialize() {
	$$('#kbbcode-toolbar li a').addEvent('mouseover', function(){
		document.id('helpbox').set('value', this.getProperty('alt'));
	});

	document.id('kbbcode-message').addEvent('change', function(){
		kPreviewHelper();
	});

	var color = $$("table.kbbcode-colortable td");
	if (color) {
		color.addEvent("click", function(){
			var bg = this.getStyle( "background-color" );
			kbbcode.focus().wrapSelection('[color='+ bg +']', '[/color]', true);
			kToggleOrSwap("kbbcode-color-options");
		});
	}
	var size = $$("div#kbbcode-size-options span");
	if (size) {
		size.addEvent("click", function(){
			var tag = this.get( "title" );
			kbbcode.focus().wrapSelection(tag , '[/size]', true);
			kToggleOrSwap("kbbcode-size-options");
		});
	}

	bindAttachments();
	newAttachment();
	//This is need to retrieve the video provider selected by the user in the dropdownlist
	if (document.id('kvideoprovider') != undefined) {
		document.id('kvideoprovider').addEvent('change', function() {
			var sel = $$('#kvideoprovider option:selected');
			sel.each(function(el) {
				document.id('kvideoprovider').store('videoprov',el.value);
			});
		});
	}

	// Fianlly apply some screwy IE7 and IE8 fixes to the html...
	IEcompatibility();
}
