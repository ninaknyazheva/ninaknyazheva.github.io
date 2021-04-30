$(document).ready(function(){
  $('.button').on('click',  function() {
    if ($('.popup').is(':visible')) {
      $('.popup').fadeOut();
    } else {
       $('.popup').fadeIn();
       $('html, body').css('overflow','hidden');
    }
  });
  $('.popup').on('click', function(event) {
    if (event.target == this){
      $('.popup').fadeOut();
      $('html, body').css('overflow','auto');
    }
  });
});
