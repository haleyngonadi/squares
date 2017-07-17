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

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 200) {
        //clearHeader, not clearheader - caps H
        $(".cl-effect-1").addClass("darkHeader");
    }

    else {
       $(".cl-effect-1").removeClass("darkHeader");
    }
});


(function() {
  var $imgs = $('#gallery img');
  var $buttons = $('#buttons');
  var tagged = {};

  $imgs.each(function() {
    var img = this;
    var tags = $(this).data('tags');

    if (tags) {
      tags.split(',').forEach(function(tagName) {
        if (tagged[tagName] == null) {
          tagged[tagName] = [];
        }
        tagged[tagName].push(img);
      })
    }
  })

  $('<button/>', {
    text: 'Show All',
    class: 'active',
    click: function() {
      $(this)
        .addClass('active')
        .siblings()
        .removeClass('active');
      $imgs.addClass('img-active');
    }
  }).appendTo($buttons);

  $.each(tagged, function(tagName) {
    var $n = $(tagged[tagName]).length;
    $('<button/>', {
      text: tagName + '(' + $n + ')',
      click: function() {
        $(this)
          .addClass('active')
          .siblings()
          .removeClass('active');
        $imgs
          .addClass('img-class').removeClass('img-active')
          .filter(tagged[tagName])
          .removeClass('img-class').addClass('img-active');
      }
    }).appendTo($buttons);
  });
}())


});