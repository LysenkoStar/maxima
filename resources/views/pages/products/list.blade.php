@extends('layout/base_page')

@section('title', __('Products'))

@section('extended_styles')
    @parent

    @vite([
      'resources/scss/pages/products.scss',
  ])
@show

@section('content')
    <div class="page page__products-list">
        <!-- Breadcrumbs -->
        {!! Breadcrumbs::render('products.by.category', $category) !!}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <h1 class="page__content-title mb-12 font-montserrat_b text-4xl text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                {{ $category->name }}
            </h1>
            <div class="page__content-main">
                @if ($products)
                    <div class="category md:grid md:grid-cols-3 lg:grid-cols-4 sm:gap-8 mt-7">
                        @foreach ($products as $product)
                            <div class="category__item block md:flex justify-center mb-7 md:mb-0">
                                <a class="category__item-link p-5 text-center" href="{{ route('products.item', ['product' => $product]) }}">
                                    <div class="category__item-image pb-5">
                                        <img class="max-h-48 m-auto" src="{{ asset("images/categories/1.png") }}" alt="">
                                    </div>
                                    <div class="category__item-title font-montserrat_b text-lg">{{ $product->name }}</div>
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
