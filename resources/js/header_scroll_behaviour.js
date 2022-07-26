$(function() {
    if ($(window).width() > 768) {
        if ($(window).scrollTop() > 40) {
            $('.header__logo').hide();
            $('.header__logo--scroll').show();
            $('.header__top-menu').hide();
            $('.header-group').css('max-height', '91px');
        }

        let initialBgPos = $('#welcome-concept__bg').offset().top;

        $(window).on('scroll', function() {
            if ($('.header__logo').length > 0) {
                var scrollTop = $(window).scrollTop();
                if ( scrollTop > 40 ) { 
                    $('.header__logo').hide();
                    $('.header__logo--scroll').show();
                    $('.header__top-menu').hide();
                    $('.header-group').css('max-height', '91px'); //Added to ensure border bottom position remains fixed
                    // $('.header__top-menu').css('height', '0px');
                } else {
                    $('.header__logo--scroll').hide();
                    $('.header-group').css('max-height', '150px');
                    if ($(window).width() > 768) {
                        $('.header__logo--desktop').show();
                        $('.header__top-menu').show();
                    } else {
                        $('.header__logo--mobile').show();
                    }
                }
            }

            // Handle animate.css animation on footer
            if ($('#footer-all-left').length > 0 && scrollTop > $('.footer-all').position().top - 550) {
                
                $('#footer-all-left').css('visibility', 'visible').addClass('animate__animated animate__fadeInLeft');
                $('#footer-all-right').css('visibility', 'visible').addClass('animate__animated animate__fadeInRight');
            }

            // Hosts table concept background parallax
            if ($('#welcome-concept__bg').length > 0 && scrollTop > 1500 && scrollTop < initialBgPos + 1300) {
                $('#welcome-concept__bg').css('top', -150 + (scrollTop - initialBgPos) / 6.2); //initialBgPos - 650 + 
            }
        });
    }
});