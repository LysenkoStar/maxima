@extends('layout/base_page')

@section('title', __('Services'))

@section('extended_styles')
    @parent
@show

@section('content')
    <div class="page page__service">
        <!-- Breadcrumbs -->
        {!! Breadcrumbs::render('services.by.name', $service) !!}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <h1 class="page__content-title mb-12 font-montserrat_b text-4xl text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                {{ __('Services') }}
            </h1>
            <div class="page__content-main">
                <div class="service">
                    <div class="service__name">
                        <svg class="icon icon-ruler h-12 w-12 fill-lightblue-500 inline-block align-middle mr-7">
                            <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                        </svg>
                        <h2 class="inline-block text-lightblue-500 font-montserrat_sb text-2xl">{{ $service->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
