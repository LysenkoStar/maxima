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

    // selectize for language
    let lang_select = $("#change_language").selectize({
        plugins: [],
        render: {
            item: function (data, escape) {
                return '<div class="lang_item">' +
                    '<img src="' + escape(data.image) + '" alt="Language ' + escape(data.text) + '" class="inline-block">' +
                    '<span class="label">' + escape(data.text) + '</span>' +
                    '</div>';
            },
            option: function (data, escape) {
                return '<div class="lang_item">' +
                        '<img src="' + escape(data.image) + '" alt="Language ' + escape(data.text) + '" class="inline-block">' +
                        '<span class="label">' + escape(data.text) + '</span>' +
                        '</div>';
            }
        },
        onChange: function (value) {
            let selectedOption = this.options[value];

            window.location.href = selectedOption['url'];
        }
    });

    let langSelectize = lang_select[0].selectize;

    if (langSelectize.getValue()) {
        let initialValue = langSelectize.getValue();
        let initialOption = langSelectize.options[initialValue];
        let initialImageUrl = initialOption['image'];
        let initialText = initialOption['text'];
    }

    // Functions

});
