window.$ = window.jQuery = jQuery;

import 'slick-carousel';
import '@fancyapps/fancybox';

(function( $ ) {

const mq = {
    "sm": 576,
    "md": 768,
    "lg": 992,
    "xl": 1200
};


$(document).on('click', '.js-nav-toggle', function (e) {
    e.preventDefault();
    console.log('12');
    $(this).toggleClass('is-active');
    $('html').toggleClass('lock');
});

var replaceMenu = function () {
    if ($(window).width() < mq.lg) {
        $('.js-panel-inner').append($('.js-nav-bar-menu'));
    } else {
        $('.js-nav-bar-right').append($('.js-nav-bar-menu'));
        $('.panel').removeClass('panel-active');
        $('.nav-toggle').removeClass('is-active');
        $('html').removeClass('lock');
    }
}

replaceMenu();
$(window).on('resize', function () {
    replaceMenu();
});




})(jQuery);