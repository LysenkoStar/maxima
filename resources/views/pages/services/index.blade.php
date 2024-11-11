@extends('layout/base_page')

@section('title', __($service->title))

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
                {{ __('general.menu.services') }}
            </h1>
            <div class="page__content-main">
                <div class="service">
                    <div class="service__name mb-3">
                        <svg class="icon icon-ruler h-12 w-12 fill-lightblue-500 inline-block align-middle mr-7">
                            <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                        </svg>
                        <h2 class="inline-block text-lightblue-500 font-montserrat_sb text-2xl">{{ $service->title }}</h2>
                    </div>
                    <div class="service__content">
                        {!! $service->text !!}
                    </div>
                    <div class="service__options mt-8">
                        @if($service->products_link)
                            <a href="#" class="btn btn-primary mr-6 bg-accent-500 filter" style="box-shadow: 0 9px 30px 0 rgba(255, 148, 0, 0.3);">{{ __('general.button.view_products') }}</a>
                        @endif

                        @if($service->applications_link)
                            <a href="#" class="btn btn-outline bg-accent-500 border-accent-500 text-accent-500">{{ __('general.button.submit_application') }}</a>
                        @endif
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
