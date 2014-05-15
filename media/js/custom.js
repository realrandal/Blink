jQuery(function($) {

	$(function(){
		$("body").on("click", ".uk-button[data-message]", function(){
			$.UIkit.notify($(this).data());
		});
	}) 

	$(".uk-tip-slow").each(function(e) {
		var tip = new $.UIkit.tooltip(this, { delay: 600  });
	});

	$(".uk-tip").each(function(e) {
		var tip = new $.UIkit.tooltip(this, { delay: 200  });
	});


	$( ".add-quick-reply" ).on( "click", function() {
		$(this).parents().prev(".quick-reply")
		.toggleClass("blink-me")
		.find(".quick-reply-textarea").focus()
	});


	$( ".close-this-reply" ).on( "click", function() {

		$(this).parents().closest(".quick-reply") 
		.toggleClass("blink-me")

	});




    // $(".add-quick-reply").click(function(){
    // $(this).prev(".uk-form")
    //        .find("textarea").focus();

    // return false;
    // });

$(document).ready(function($) {



if ($('.main-topic-title').height() > 5) {
    // Greater than 700px in height

    $(this).addClass( "fancy" );
}


	var wbbOpt = {

allButtons: {
    quote: {
      transform: {
        '<div class="kmsgtext-quote">{SELTEXT}</div>':'[quote]{SELTEXT}[/quote]',
        '<div class="kmsgtext-quote"><cite><a href="#{POSTID}"><i class="uk-icon-quote-left"></i> {AUTHOR} napisał(a)</i></a>:</cite><br> {SELTEXT}</div>':'[quote="{AUTHOR}" post={POSTID}]{SELTEXT}[/quote]'
      }
    }
  },

		lang: "pl",
		height: "200",

		// buttons: "bold,italic,underline,strike,sup,sub,|,img,video,link,|,bullist,numlist,|,fontcolor,fontsize,fontfamily,|, justifyleft, justifycenter,justifyright,|, quote,code,table,removeFormat",
		buttons: "bold,italic,underline,strike,|,img,link,|,smilebox,bullist,numlist,|,fontcolor,fontsize,|,justifyleft,justifycenter,justifyright,|,quote,table,removeFormat",
		

		smileList: [
{title:CURLANG.sm1, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/cool.png" class="sm">', bbcode:"B)"},
{title:CURLANG.sm3, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/smile.png" class="sm">', bbcode:":)"},
{title:CURLANG.sm3, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/laughing.png" class="sm">', bbcode:":D"},
{title:CURLANG.sm4, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/cheerful.png" class="sm">', bbcode:":cheer:"},
{title:CURLANG.sm5, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/wink.png" class="sm">', bbcode:";)"},
{title:CURLANG.sm6, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/tongue.png" class="sm">', bbcode:":P"},
{title:CURLANG.sm2, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/sad.png" class="sm">', bbcode:":("},
{title:CURLANG.sm7, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/angry.png" class="sm">', bbcode:":angry:"},
{title:CURLANG.sm8, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/unsure.png" class="sm">', bbcode:":unsure:"},
{title:CURLANG.sm9, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/shocked.png" class="sm">', bbcode:":ohmy:"},
{title:CURLANG.sm10, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/wassat.png" class="sm">', bbcode:":huh:"},
{title:CURLANG.sm11, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/ermm.png" class="sm">', bbcode:":dry:"},
{title:CURLANG.sm12, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/sick.png" class="sm">', bbcode:":sick:"},
{title:CURLANG.sm13, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/silly.png" class="sm">', bbcode:":silly:"},
{title:CURLANG.sm14, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/blink.png" class="sm">', bbcode:":blink:"},
{title:CURLANG.sm15, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/blush.png" class="sm">', bbcode:":oops:"},
{title:CURLANG.sm16, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/w00t.png" class="sm">', bbcode:":woohoo:"},
{title:CURLANG.sm17, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/devil.png" class="sm">', bbcode:":evil:"},
{title:CURLANG.sm18, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/whistling.png" class="sm">', bbcode:":whistle:"},
{title:CURLANG.sm19, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/hmmm.gif" class="sm">', bbcode:":hmmm:"},
{title:CURLANG.sm20, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/happy-smiley58.gif" class="sm">', bbcode:"happy-smiley"},
{title:CURLANG.sm21, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/placze.gif" class="sm">', bbcode:":placz:"},
{title:CURLANG.sm22, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/youaregood.gif" class="sm">', bbcode:":ok:"},
{title:CURLANG.sm23, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/jezor2.gif" class="sm">', bbcode:":jezor:"},
{title:CURLANG.sm24, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/piwko.gif" class="sm">', bbcode:":piwo:"},
{title:CURLANG.sm25, img: '<img src="http://biegajznami.pl/media/kunena/emoticons/dzieki.gif" class="sm">', bbcode:":dzieki:"}

]

}

$("#kbbcode-message").wysibb(wbbOpt); 
// $(".quick-reply-textarea").wysibb(wbbOpt); 

$("time.timeago").timeago();
$('.message-signature').toggleClass('uk-hidden', $.cookie('signatures') === 'hidden');
$('.signs-switch').toggleClass('signatures-hidden', $.cookie('signatures') === 'hidden');

$(".signs-switcher").click(function () {
	$(".message-signature").toggleClass("uk-hidden");
	$('.signs-switch').toggleClass("signatures-hidden");
	$.cookie('signatures', $(".message-signature").hasClass('uk-hidden') ? 'hidden' : 'visible', { path: '/' });
}); 

});




 










// $(window).load(function($) {



// });


// $(window).bind("load", function() {


// $('a').click(function(){
//     $('html, body').animate({
//scrollTop: $( $.attr(this, 'href') ).offset().top
//     }, 500);
//     return false;
// });


// });


});