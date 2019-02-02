$(document).ready(function () {

    'use strict';

    //calculate body padding top depend on navbar height

    $('body').css('paddingTop', $('.navbar').innerHeight());

    // smoothly scroll to element

    $('.navbar li a').click(function (e) {

        e.preventDefault();

        $('html, body').animate({

            scrollTop: $('#' + $(this).data('scroll')).offset().top + 1

        }, 1000 );

    });

    //Add Active Class On Navbar link and remove from siblings

    $('.navbar li a').click(function () {

        //this two lines equals to tho long line of code later
        // $('.navbar a').removeClass('active');
        //
        // $(this).addClass('active');

       $(this).addClass('active').parent().siblings().find('a').removeClass('active');

    });

    $(window).scroll(function () {

        //sync Navbar links with sections

        $('.block').each(function () {

            if ($(window).scrollTop() > $(this).offset().top) {

                var blockID = $(this).attr('id');

                $('.navbar a').removeClass('active');

                $('.navbar li a[data-scroll="' + blockID + '"]').addClass('active');

            }

        });

        //scroll to top button

        var scrollToTop = $('.scroll-to-top');

        if($(window).scrollTop() >= 1000) {

            if (scrollToTop.is(':hidden')) {

                console.log(scrollToTop + 'hidden');
            }

         scrollToTop.fadeIn(400);

        } else {

            scrollToTop.fadeOut(400);
        }
    });

    // click on Scroll to top to go up

    $('.scroll-to-top').click(function (event) {

        event.preventDefault();

        $('html, body').animate({

            scrollTop:0

        }, 1000 );

    });
});