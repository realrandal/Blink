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