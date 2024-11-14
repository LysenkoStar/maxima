@extends('layout/base_page')

@section('title', $product->name)

@section('extended_styles')
    @parent

    @vite([
      'resources/scss/pages/product.scss',
  ])
@show

@section('content')
    <div class="page page__product">
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('product', $product) }}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <div class="page__content-main">
                <section class="page__product-details" x-data="{ activeTab: 'about' }">
                    <!-- Tabs Section -->
                    <div class="border-b-2 border-gray-700">
                        <nav class="flex space-x-4 -mb-[2px]">
                            <button @click="activeTab = 'about'"
                                    :class="{'text-accent-500 border-accent-500': activeTab === 'about', 'text-white border-transparent': activeTab !== 'about'}"
                                    class="tab-button text-base px-4 py-2 border-b-2 font-montserrat_m uppercase">{{ __(key: 'general.about_product') }}</button>
                            <button @click="activeTab = 'characteristics'"
                                    :class="{'text-accent-500 border-accent-500': activeTab === 'characteristics', 'text-white border-transparent': activeTab !== 'characteristics'}"
                                    class="tab-button text-base px-4 py-2 border-b-2 font-montserrat_m uppercase">{{ __(key: 'general.characteristics') }}</button>
                        </nav>
                    </div>

                    <!-- Tab Content -->
                    <div x-show="activeTab === 'about'" class="page__product-tab mt-6">
                        <!-- Content for "ВСЕ О ТОВАРЕ" -->
                        <div class="flex flex-col lg:flex-row items-stretch">
                            <!-- Product Images -->
                            <div class="page__product-image lg:w-1/3 flex flex-col justify-between">
                                <div class="product__image-main swiper relative overflow-hidden flex-1 w-full ">
                                    <div class="product__status absolute top-5 left-5 font-montserrat_b text-xs text-lightblue-500">
                                        @if($product->status)
                                            {{ __(key: 'general.in_stock') }}
                                        @else
                                            {{ __(key: 'general.out_of_stock') }}
                                        @endif
                                    </div>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_1.png') }}" alt="Product" class="object-none flex-shrink-0 m-auto h-full">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_2.png') }}" alt="Product" class="object-none flex-shrink-0 m-auto h-full">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_3.png') }}" alt="Product" class="object-none flex-shrink-0 m-auto h-full">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_2.png') }}" alt="Product" class="object-none flex-shrink-0 m-auto h-full">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_1.png') }}" alt="Product" class="object-none flex-shrink-0 m-auto h-full">
                                        </div>
                                    </div>
                                </div>
                                <div thumbsSlider=""  class="product__image-secondary swiper h-16 mt-4 w-full">
                                    <div class="swiper-wrapper">
                                        <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                            <img src="{{ asset('images/products/product_1.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                            <img src="{{ asset('images/products/product_2.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                            <img src="{{ asset('images/products/product_3.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                            <img src="{{ asset('images/products/product_2.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                            <img src="{{ asset('images/products/product_1.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="page__product-info lg:w-2/3 lg:pl-8 mt-6 lg:mt-0 flex flex-col justify-between">
                                <div class="page__product-info-top">
                                    <h1 class="font-montserrat_b text-2xl lg:text-4xl font-bold mb-7">{{ $product->name }}</h1>
                                    <div class="product__details font-montserrat text-white text-2xl">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="page__product-info-bottom mt-auto">
                                    <div class="page__product-info-price text-white font-montserrat_b text-3xl">
                                        <div class="product-price">1 000<span class="product-price-sign pl-1">&#8372;</span>
                                        </div>
                                    </div>
                                    <div class="page__product-info-actions flex space-x-2 mt-4">
                                        <button class="btn btn-primary bg-accent-500 filter">{{ __(key: 'general.button.order') }}</button>
                                        <button class="btn btn-outline bg-accent-500 border-accent-500 text-accent-500">{{ __(key: 'general.button.calculate') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'characteristics'" class="page__product-tab mt-6">
                        <!-- Content for "ХАРАКТЕРИСТИКИ" -->
                        <h2 class="text-xl font-bold">{{ __(key: 'general.main_characters') }}</h2>

                        {!! $product->description !!}
                    </div>
                </section>

                <!-- Related Products -->
                <section class="page__product-related container mx-auto px-4 my-12 lg:py-12">
                    <h2 class="font-montserrat_sb text-3xl">{{ __(key: 'general.related_products') }}</h2>
                    <div class="page__product-related-slider swiper grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        <div class="swiper-wrapper max-h-[350px] px-7 py-4">
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП1 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП2 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП3 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП4 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП5 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                            <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                    {{ __(key: 'general.in_stock') }}
                                </div>
                                <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="max-h-48 m-auto">
                                <p class="text-lg text-white flex-grow">Опоры ОПП6 ГОСТ 14911-82</p>
                                <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                    <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                        2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                    </div>
                                    <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('extended_scripts')
    @parent

    @vite(['resources/js/pages/product.js'])
@stop
