// Window ready
$( document ).ready(function() {

    $('input[id^="name_en"]').on('keyup', function() {
        let title = $(this).val();
        let url = $('#slug').data('route');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                title: title
            },
            success: function(response) {
                $('#slug').val(response.slug);
                $('#slug_hidden').val(response.slug);
            }
        });
    });

    document.getElementById('image').addEventListener('change', function(event) {
        previewImage(event);
    });

    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

});
