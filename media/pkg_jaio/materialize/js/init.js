(function($){
  $(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.collapsible').collapsible();
    $('select').formSelect();
    $('#alert_close').click(function(){
        $( "#system-message-container" ).fadeOut( "slow", function() {
        });
    });
    $('.tabs').tabs();
	$('.parallax').parallax();
  }); // end of document ready
})(jQuery); // end of jQuery name space
