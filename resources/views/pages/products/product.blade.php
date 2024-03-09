@extends('layout/base_page')

@section('title', __('Products'))

@section('extended_styles')
    @parent

    @vite([
      'resources/scss/pages/products.scss',
  ])
@show

@section('content')
    <div class="page page__products">
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('products') }}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <h1 class="page__content-title mb-12 font-montserrat_b text-4xl text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                {{__('Products') }}
            </h1>
            <div class="page__content-main">

            </div>
        </div>
    </div>
@stop

@section('extended_scripts')
    @parent
@stop
