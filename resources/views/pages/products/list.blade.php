@extends('layout/base_page')

@section('title', $category->name)

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
                    <div class="category grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-8 mt-7">
                        @foreach ($products as $product)
                            <div class="category__item block md:flex flex-col justify-center mb-7 md:mb-0 relative font-montserrat_b">
                                <div class="category__item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <div class="category__item-info flex flex-col flex-1 p-5 text-center">
                                    <div class="category__item-image pb-5">
                                        <img class="max-h-48 m-auto" src="{{ $product->getImageUrlBySize() }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="category__item-title text-lg pb-3">{{ $product->name }}</div>
                                    <div class="category__item-action mt-auto flex justify-between items-center space-x-2 px-5 md:px-0">
                                        <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                            @if($product->isShowPrice())
                                                {{ $product->getPrice() }}
                                                <span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                            @else
                                                <span class="text-sm">
                                                    {{ __(key: 'general.on_request') }}
                                                </span>
                                            @endif
                                        </div>
                                        <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="page__content-pagination mt-5">
                        <!-- Display pagination links -->
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('extended_scripts')
    @parent
@stop
