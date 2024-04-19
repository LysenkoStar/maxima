import Sortable from 'sortablejs';

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


    // Upload product images
    let uploadFiles = [];

    function updateFileList(inputFiles) {
        // Add newly selected files to the array
        for (let i = 0; i < inputFiles.length; i++) {
            // Optionally, prevent duplicates
            if (!uploadFiles.find(f => f.name === inputFiles[i].name)) {
                uploadFiles.push(inputFiles[i]);
            }
        }
    }

    function deleteImage(element) {
        let toRemove = element.parentElement;
        toRemove.parentNode.removeChild(toRemove);

        console.log(uploadFiles, element);


        if (uploadFiles.length <= 0) {
            console.log(111111111);
            previewBlockState(false);
        }
    }

    function previewBlockState(show) {
        let previewWrapper = document.querySelector('.image__upload .image__upload-preview');

        console.log(previewWrapper);
        if (previewWrapper) {
            if (previewWrapper.classList.contains('hidden') && show) {
                previewWrapper.classList.remove('hidden');
            } else {
                previewWrapper.classList.add('hidden');
            }
        }
    }

    function updatePreviewFiles() {
        console.log('updatePreviewFiles');
        if (!uploadFiles.length) {
            previewBlockState(false);
            return;
        }

        let preview = document.getElementById('imagePreview');
        preview.innerHTML = ''; // Clear existing previews

        Array.from(uploadFiles).forEach((file, index) => {
            let reader = new FileReader();

            reader.onload = function(e) {
                let div = document.createElement('div');
                div.setAttribute('class', 'relative h-48 cursor-grab');
                div.innerHTML = `<img src="${e.target.result}" class="absolute inset-0 w-full h-full object-cover" alt=""/>`;

                let deleteBtn = document.createElement('button');
                deleteBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">\n' +
                    '  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />\n' +
                    '</svg>';
                deleteBtn.setAttribute('class', 'delete-btn absolute top-0 right-0 bg-gray-100 p-1 text-accent-500 cursor-pointer opacity-75 hover:opacity-100');
                deleteBtn.addEventListener('click', () => deleteImage(deleteBtn));

                div.appendChild(deleteBtn);
                preview.appendChild(div);
            };

            reader.readAsDataURL(file);
        });

        previewBlockState(true);
    }

    document.getElementById('imageUpload').addEventListener('change', function(e) {
        updateFileList(e.target.files);
        updatePreviewFiles();
    });

    new Sortable(document.getElementById('imagePreview'), {
        animation: 150,
        ghostClass: 'bg-gray-200',
    });
});

