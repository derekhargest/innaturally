(function($) {
    "use strict";

    var mySwiper = new Swiper('.swiper-container', {
        loop: false,
        //direction: 'vertical',
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="'+ 'item-' + index + ' ' + className + '"></span>';
            },
        },
        effect: 'fade',
        fadeEffect: { crossFade: true },
        mousewheel: true,
        speed: 2000,
        autoHeight: true,
        //autoplay: {
        //	delay: 5000,
        //}
    });

    mySwiper.on('slideChange', function () {
        if ($( ".swiper-container" ).hasClass( "swiper-non-border" )) {
            $( ".swiper-container" ).removeClass( "swiper-non-border" );
        }
        //console.log('slide changed');
      });

    $('[data-fancybox]').fancybox({
        toolbar  : true
    });

})(jQuery);