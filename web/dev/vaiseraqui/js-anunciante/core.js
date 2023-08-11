function callRecaptcha() {
    grecaptcha.ready(function () {
        grecaptcha.execute(public_recaptcha, { action: "" }).then(function (e) {
            document.getElementById("g-recaptcha-response").value = e;
        });
    });
}

function carregaMapa(){
       $.post(PATHSITE + 'utils/carregaMapa', {}, function (retorno) {
            $('#map').html(retorno);
        });
}


var options = {
  type: "delay",
  time: "3000",
  scripts: ["https://www.google.com/recaptcha/api.js?render=" + public_recaptcha],
  success: function () {
    
   carregaMapa();
    
    var instagram = '<iframe src="https://snapwidget.com/embed/914930" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:700px; height:275px"></iframe>';
    
    $("#instagram-frame").html(instagram);
    
        var instagram = '<iframe src="https://snapwidget.com/embed/914930" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:480px; height:160px"></iframe>';
    
    $("#instagram-frame2").html(instagram);
    
    callRecaptcha();
   setInterval(function () {
                    callRecaptcha();
                }, 1e5);
  }
};
$.lazyscript(options);

$(window).on("load", function() {
  var e = function(e) {
    return 11 === e.replace(/\D/g, "").length ? "(00) 00000-0000" : "(00) 0000-00009";
  },
      o = {
        onKeyPress: function(o, a, t, s) {
          t.mask(e.apply({}, arguments), s);
        },
      };
  $(".telefone").mask(e, o);
});

(function () {
  "use strict";  
  var carousels = function () {
    $(".owl-carousel1").owlCarousel({
      loop: false,
      center: false,
      autoplay: false,
      margin: 30,        
      responsiveClass: true,
      nav: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        680: {
          items: 2,
          nav: false,
          loop: false
        },
        1000: {
          items: 3,
          nav: false
        }
      }
    });
  };

  (function ($) {
    carousels();
  })(jQuery);
})();

(function () {
  "use strict";  
  var carousels = function () {
    $(".owl-carousel2").owlCarousel({
      loop: true,
      center: true,
      dots: false,
      autoplay: false,
      responsiveClass: true,
      nav: true,
      navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
      responsive: {
        0: {
          items: 1,
          nav: false,
          dots: true
        },
        680: {
          items: 2,
          nav: true,
          loop: true,
          dots: true
        },
        992:{
          items: 1,
          stagePadding: 250,
          nav: true
        },
        1200: {
          items: 1,
          stagePadding: 350,
          nav: true
        }
      }
    });
  };

  (function ($) {
    carousels();
  })(jQuery);
})();

var actives = $(".owl-carousel2 .owl-stage .active");
primeiro = $(actives).first();
ultimo = $(actives).last();

$(".iconWrapper").click(function() {
  $('rect').removeClass("disableAnimation");
  $('img').removeClass("disableAnimation");
  $('div').removeClass("disableAnimation");

  $(".iconWrapper").toggleClass("open");
  $(".box").toggleClass("open");
  $("img").toggleClass("open");
  setTimeout(() => {
    $(".navigationWrapper").toggleClass("open");
    $("#menu-mobile").toggleClass("hover");
    $("#menu-mobile").toggleClass("position-fixed");
  }, 350);
});

$(window).bind('scroll', function () {
  if ($(window).scrollTop() > 50) {
    $('#menu').addClass('menu-fixed');
     $('#menu-mobile').addClass('menu-fixed');
     $('#agendamento-mobile').addClass('agendamento-fixed');
  } else {
    $('#menu').removeClass('menu-fixed');
      $('#menu-mobile').removeClass('menu-fixed');
       $('#agendamento-mobile').removeClass('agendamento-fixed');
  }
});

function listaWhatsapp() {
  $(".shown").length <= 0 ? ($(".whatsapp2").addClass("shown"), $(".ul-whatsapp").addClass("shown")) : ($(".whatsapp2").removeClass("shown"), $(".ul-whatsapp").removeClass("shown"))
}

($(window).on("load", function() {
  $(".bxsliderBanner").royalSlider({
    loop: !0,
    loopRewind: !0,
    keyboardNavEnabled: !0,
    controlsInside: !1,
    imageScaleMode: "fill",
    arrowsNavAutoHide: !1,
    autoScaleSlider: !0,
    autoScaleSliderWidth: 990,
    autoScaleSliderHeight: 880,
    arrowsNav: !1,
    controlNavigation: "bullets",
    thumbsFitInViewport: !1,
    navigateByClick: !0,
    startSlideId: 0,
    autoPlay: {
      enabled: !0,
      pauseOnHover: !0,
      delay: 4e3
    },
    transitionType: "move",
    globalCaption: !1,
    deeplinking: {
      enabled: !0,
      change: !1
    },
  });
}));
