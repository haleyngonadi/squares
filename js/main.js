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
        $(".sub-menu").addClass("darkHeader");
    }

    else {
       $(".sub-menu").removeClass("darkHeader");
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
      $imgs.removeClass('img-class').addClass('img-active animated bounceIn').removeClass('bounceOut');
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
          .addClass('img-class').removeClass('img-active').addClass('animated bounceOut')
          .filter(tagged[tagName])
          .removeClass('img-class').removeClass('animated bounceOut').addClass('img-active').addClass('animated bounceIn');
      }
    }).appendTo($buttons);
  });
}())


$( "button" ).click(function() {
  setTimeout(function(){
    $('.img-active').removeClass('bounceIn');
},800);
});



$('.image-link').magnificPopup({
  type: 'image'
  // other options
});

$("a[href='#up-top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});


    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
          //  window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });


  $(document).on("scroll", onScroll);

     function onScroll(event){
     var scrollPos = $(document).scrollTop();
     $('nav a').each(function () {

        var currLink = $(this);

        var refElement = $((currLink).attr("href"));

        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('nav ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}

if ($(document.body).height() < $(window).height()) {
  $('.footer').attr('style', 'position: fixed!important; bottom: 0px;');
}


});