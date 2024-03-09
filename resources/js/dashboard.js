import jQuery from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.$ = jQuery;

Alpine.start();


// Window OnLoad
$(window).on('load', function () {
    $('.css-loader').hide();

});

// Window ready
$( document ).ready(function() {
    console.log(321321321);
});
