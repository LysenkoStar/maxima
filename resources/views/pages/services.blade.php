@extends('layout/base_page')

@section('title', __('general.menus.Services'))

@section('extended_styles')
    @parent
@show

@section('content')
    <div class="page page__services">
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('services') }}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <h1 class="page__content-title mb-12 font-montserrat_b text-4xl text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                {{__('general.menus.Services') }}
            </h1>
            <div class="page__content-main">
                @if ($services)
                    <div class="service md:grid md:grid-cols-3 lg:grid-cols-4 sm:gap-8 mt-7">
                        @foreach ($services as $service)
                            <div class="service__item block md:flex justify-start mb-7 md:mb-0">
                                <a class="service__item-link p-5" href="{{ route('services.by.name', ['service' => $service]) }}">
                                    <div class="service__item-image w-14 h-14 mb-7">
                                        <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                            <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                        </svg>
                                    </div>
                                    <div class="service__item-title text-lightblue-500 font-montserrat_sb uppercase text-lg">{{ $service->name }}</div>
                                    <div class="service__item-text font-montserrat text-lg">{{ $service->short_description }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('extended_scripts')
    @parent
@stop
