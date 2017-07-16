$(document).ready(function(){
  $('.owl-carousel').owlCarousel( {

  	items:1,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
        lazyLoad:true

  	});

  new WOW().init();

});