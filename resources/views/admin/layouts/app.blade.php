<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">

        <title>{{ config('app.name', 'Dashboard') }}</title>

        <!-- Scripts -->
        @vite([
            'resources/scss/dashboard.scss',
            'resources/js/dashboard.js'
        ])
    </head>
    <body class="font-sans antialiased">
        @include('layout/base/preloader')
        <div class="min-h-screen bg-gray-100">
            @include('admin.layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @include('partials/alerts')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @section('extended_scripts')
        @show
    </body>
</html>
