<!DOCTYPE html>
<html lang="ru-RU">

    @include('layout/base/head')

    @vite([
        'resources/css/app.css',
        'resources/scss/app.scss',
        'resources/js/app.js',
        'resources/js/main.js'
        ])
<body>
    @include('layout/base/preloader')

    @include('components/header')

    <div class="content">

        @section('content')
        @show

    </div>

    @include('components/footer')

    @section('extended_scripts')
        <script src="static/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="static/js/vendors/libs.js"></script>
    @show

</body>
</html>
