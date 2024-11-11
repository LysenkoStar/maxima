<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('layout/base/head')

    @vite([
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
    @show

    {{--  Micromarkup  --}}
    @isset($micromarkup)
        @include('partials.seo.micromarkup_jsonld')
    @endisset

</body>
</html>
