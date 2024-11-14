@extends('layout/base_page')

@section('title', __(key: 'pages/not_found.title'))

@section('content')
    <div class="page page__error">
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('errors.404') }}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <div class="page__content-main relative flex justify-center min-h-screen sm:min-h-96 items-center pt-0">

                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center pt-8 sm:justify-start sm:pt-0 text-white">
                        <div class="px-4 text-lg border-r border-white tracking-wider">
                            {{ __(key: 'pages/not_found.error_code') }}
                        </div>
                        <div class="ml-4 text-lg uppercase tracking-wider">
                            {{ __(key: 'pages/not_found.page_not_found') }}
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <a href="{{ url('/') }}" class="text-accent-500 font-open_sans hover:text-accent-400">{{ __(key: 'pages/not_found.message.return_home_page') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
