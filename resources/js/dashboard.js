import jQuery from 'jquery';
import Alpine from 'alpinejs';
import ClassicEditor from "./plugins/ckeditor.js";

window.Alpine = Alpine;
window.$ = jQuery;

Alpine.start();


// Window OnLoad
$(window).on('load', function () {
    $('.css-loader').hide();

});

// Window ready
$( document ).ready(function() {

    // initialize ckeditor
    document.querySelectorAll('.ckeditor').forEach(element => {
        ClassicEditor
            .create(element)
            .catch( error => {
                console.error( error.stack );
            } );
    });

});
