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

    if (typeof initialFiles !== 'undefined' && initialFiles.length > 0) {
        uploadFiles = initialFiles.map(file => ({
            file: null,
            url: file.url,
            enabled: file.enabled,
            isExisting: true
        }));

        updatePreviewFiles();
    }

    // Function to toggle status of an image
    function toggleImageStatus(index) {
        uploadFiles[index].enabled = !uploadFiles[index].enabled;

        updatePreviewFiles();
    }

    function updateFileList(inputFiles) {
        for (let i = 0; i < inputFiles.length; i++) {
            const file = inputFiles[i];

            if (!uploadFiles.find(f => f.file && f.file.name === file.name)) {
                uploadFiles.push({ file: file, enabled: true, isExisting: false });
            }
        }

        updatePreviewFiles();
    }

    function deleteImage(element) {
        const index = Array.from(element.parentElement.parentElement.children).indexOf(element.parentElement);
        uploadFiles.splice(index, 1);

        updatePreviewFiles();
    }

    function previewBlockState(show) {
        const previewWrapper = document.querySelector('.image__upload .image__upload-preview');

        if (previewWrapper) {
            if (show) {
                previewWrapper.classList.remove('hidden');
            } else {
                previewWrapper.classList.add('hidden');
            }
        }
    }

    function updatePreviewFiles() {
        if (!uploadFiles.length) {
            previewBlockState(false);
            return;
        }

        let preview = document.getElementById('imagePreview');
        preview.innerHTML = ''; // Clear existing previews

        uploadFiles.forEach((fileObj, index) => {
            const { file, url, enabled, isExisting } = fileObj;

            let div = document.createElement('div');
            div.setAttribute('class', 'relative h-48 cursor-grab');
            let imgSrc = isExisting ? url : URL.createObjectURL(file);
            div.innerHTML = `<img src="${imgSrc}" class="absolute inset-0 w-full h-full object-cover" alt=""/>`;

            // Delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>';
            deleteBtn.className = 'delete-btn absolute top-0 right-0 bg-gray-100 p-1 text-accent-500 cursor-pointer opacity-75 hover:opacity-100';
            deleteBtn.addEventListener('click', (event) => {
                event.preventDefault();
                deleteImage(deleteBtn);
            });

            // Status toggle button
            let statusBtn = document.createElement('button');
            statusBtn.className = 'status-btn absolute bottom-0 left-0 p-1 text-white rounded-full';
            statusBtn.style.backgroundColor = enabled ? 'green' : 'red';
            statusBtn.innerHTML = enabled
                ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-4 h-4"><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" /><path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" /></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-4 h-4"><path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" /><path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" /></svg>';

            statusBtn.addEventListener('click', (event) => {
                event.preventDefault();
                toggleImageStatus(index);
            });

            div.appendChild(deleteBtn);
            div.appendChild(statusBtn);
            preview.appendChild(div);
        });

        previewBlockState(true);
    }

    document.getElementById('imageUpload').addEventListener('change', function(e) {
        updateFileList(e.target.files);
    });

    new Sortable(document.getElementById('imagePreview'), {
        animation: 150,
        ghostClass: 'bg-gray-200',
        onEnd: function() {
            updateFilePositions();
        }
    });

    function updateFilePositions() {
        const previewItems = document.querySelectorAll('#imagePreview > div');

        previewItems.forEach((item, index) => {

            const indexInUploadFiles = Array.from(item.parentNode.children).indexOf(item);

            if (uploadFiles[indexInUploadFiles]) {
                uploadFiles[indexInUploadFiles].position = index;
            }
        });
    }

    // todo: update product model with images
});

