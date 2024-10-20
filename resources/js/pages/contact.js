// Window ready
$( document ).ready(function() {

    const fileInput = document.getElementById('filesInput');
    const fileList = document.getElementById('filesList');

    // Отслеживать изменения в input[type="file"]
    fileInput.addEventListener('change', function() {
        // Очищаем список перед выводом новых файлов
        fileList.innerHTML = '';

        // Если файлы выбраны
        if (fileInput.files.length > 0) {
            const ul = document.createElement('ul'); // создаем список

            // Проходим по каждому выбранному файлу
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                const li = document.createElement('li'); // создаем элемент списка
                li.textContent = file.name; // добавляем имя файла
                ul.appendChild(li); // добавляем элемент списка в ul
            }

            fileList.appendChild(ul); // выводим список файлов на страницу
        }
    });

});
