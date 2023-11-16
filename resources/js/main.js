// Window OnLoad
$(window).on('load', function () {
    $('.css-loader').hide();

});

// Window ready
$( document ).ready(function() {
    // Events
    $("header .mobile_menu").on("click", function(e) {
        e.preventDefault();

        $(this).toggleClass('active');
        $('.sidebar').toggleClass('active');
    });

    // Functions

});
