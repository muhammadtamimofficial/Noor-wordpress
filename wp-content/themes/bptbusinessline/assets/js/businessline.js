(function ($) {
    "use strict";
    $(document).ready(function () {
        /*--------------------------------------------
        1. Remove # From URL
        --------------------------------------------*/
        $('a[href="#"]').on('click', function (e) {
            e.preventDefault();
        });
        /*--------------------------------------------
        2. On Scroll NavBar Fixed and Back To Top Show
        --------------------------------------------*/
        $(window).on('scroll', function () {
            if ($(window).width() > 300) {
                if ($(window).scrollTop() > 300) {
                    $('#header').addClass('navbar-fixed-top');
                    $('#back-to-top').addClass('reveal');
                } else {
                    $('#header').removeClass('navbar-fixed-top');
                    $('#back-to-top').removeClass('reveal');
                }
            }
        });
        /*--------------------------------------------
        3. Back To Top
        --------------------------------------------*/
        $('#back-to-top').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 1000);
            return false;
        });
        /*--------------------------------------------
        12. WOW JS
        --------------------------------------------*/
        new WOW().init();
        /*--------------------------------------------
        13. Page Preloader
        --------------------------------------------*/
        $(window).on('load', function (){
            $("#loading").fadeOut(500);
        });
        /*--------------------------------------------
        13. Bootstrap Navwalker nav ul class replace
        --------------------------------------------*/
        $('header .navbar .dropdown').addClass('drop');
        $('header .navbar .dropdown-menu').addClass('drop-down');
        $('header .navbar').find('.dropdown-menu').removeClass('dropdown-menu');

    });
})(jQuery);
