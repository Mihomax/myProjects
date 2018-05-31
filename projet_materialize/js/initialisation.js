
$(document).ready(function(){
  $('select').formSelect();
});

function carousel () {
/*
  M.AutoInit();
 

 
 $(document).ready(function(){
    $('.carousel').carousel();
  });
$('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 2000);
  */
  
  /*
    $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
  
  $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 2000); // every 2 seconds
  */
  
    $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
  
 
autoplay()   

}

function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}