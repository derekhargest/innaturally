(function($) {
    "use strict";

    $(document).ready(function() {

        function mobileAnchorMenu() {
            if ($(window).width() < 1024) {
                $('.main-navigation').addClass('prevent-menu');
            } else {
                $('.main-navigation').removeClass('prevent-menu');
            }
        }

        mobileAnchorMenu();

        $(window).resize(function () {
            mobileAnchorMenu();
        });

        var $owl = $('#gmmb-posts'),
            owloptions = {
            loop: false,
            nav: true,
            dots: false,
            //dotsEach: true,
            //dotsData: true,
            margin: 30,
                navText: [
                    '<i class="arrow-left"></i>',
                    '<i class="arrow-right"></i>'
                ],
                responsiveClass: true,
            responsive: {
                0 : {
                    items: 1,
                },
                992 : {
                    items: 4,
                }
            },
        };

        // Method 1
        $owl.owlCarousel(owloptions);
        //window.dispatchEvent(new Event('resize'));

        // Method 2
        //$owl.owlCarousel(owloptions);

        // Remove the owl-loaded class after initialisation
        //$owl.owlCarousel().removeClass('owl-loaded');

        // Show the carousel and trigger refresh
        //$owl.show(function() {
        //    $(this).addClass('owl-loaded').trigger('refresh.owl.carousel');
        //});

        //-------------------------------------------------------------//

        var bigimage = $("#big");
        var thumbs = $("#thumbs");
        var syncedSecondary = true;

        bigimage
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: false,
                responsiveRefreshRate: 200,
                navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ]
            })
            .on("changed.owl.carousel", syncPosition);

        thumbs
            .on("initialized.owl.carousel", function() {
                thumbs
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            })
            .owlCarousel({
                items: 5,
                margin: 10,
                dots: false,
                nav: false,
                navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ],
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 4,
                responsiveRefreshRate: 100
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            var current = el.item.index;

            //to disable loop, comment this block
            //var count = el.item.count - 1;
            //var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            //if (current < 0) {
            //    current = count;
            //}
            //if (current > count) {
            //    current = 0;
            //}
            //to this

            thumbs
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");

            var onscreen = thumbs.find(".owl-item.active").length - 1;
            var start = thumbs
                .find(".owl-item.active")
                .first()
                .index();
            var end = thumbs
                .find(".owl-item.active")
                .last()
                .index();

            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }

            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true);
        });

        //-------------------------------------------------------------//

        var $owlnews = $('#news'),
            newsowloptions = {
            //loop: true,
            nav: true,
            dots: false,
            //dotsEach: true,
            //dotsData: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0 : {
                    items: 1,
                },
                992 : {
                    items: 3,
                }
            },
                navText: [
                    '<i class="arrow-left"></i>',
                    '<i class="arrow-right"></i>'
                ],
        };

        $owlnews.owlCarousel(newsowloptions);

        // Remove the owl-loaded class after initialisation
        $owlnews.owlCarousel().removeClass('owl-loaded');

        // Show the carousel and trigger refresh
        $owlnews.show(function() {
            $(this).addClass('owl-loaded').trigger('refresh.owl.carousel');
        });
    });
})(jQuery);