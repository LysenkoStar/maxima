<!DOCTYPE html>
<html lang="ru-RU">

    @include('layout/base/head')

    @vite([
        'resources/css/app.css',
        'resources/scss/app.scss',
        'resources/js/app.js',
        'resources/js/main.js'
    ])

    @section('extended_styles')
    @show
<body>
    @include('layout/base/preloader')

    @include('components/header')

    <main class="content">
        <div @class(['container my-12' => !request()->routeIs('page.home')])>
            @include('partials/alerts')

            @section('content')
            @show
        </div>
    </main>

    @include('components/footer')

    @section('extended_scripts')
        <script src="static/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="static/js/vendors/libs.js"></script>
    @show

</body>
</html>
