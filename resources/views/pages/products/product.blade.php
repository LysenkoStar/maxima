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
                                    <div class="product__status absolute top-5 left-5 font-montserrat_b text-xs text-lightblue-500 z-10">
                                        {{ $product->getStockStatus() }}
                                    </div>
                                    <div class="swiper-wrapper min-h-min lg:min-h-72">
                                        @foreach($product->getImagesBySize(\App\Enums\Images\ProductImageSizes::medium) as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ $image->url }}"
                                                     alt="{{ $image->getImageDescription() }}"
                                                     class="object-contain flex-shrink-0 m-auto h-full">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div thumbsSlider=""  class="product__image-secondary swiper h-16 mt-4 w-full">
                                    <div class="swiper-wrapper">
                                        @foreach($product->getImagesBySize(\App\Enums\Images\ProductImageSizes::small) as $image)
                                            <div class="product__image-secondary-item swiper-slide bg-darkslateblue-500 rounded-sm p-1">
                                                <img src="{{ $image->url }}"
                                                     alt="{{ $image->getImageDescription() }}"
                                                     class="object-contain w-full h-full">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="page__product-info lg:w-2/3 lg:pl-8 mt-6 lg:mt-0 flex flex-col justify-between">
                                <div class="page__product-info-top">
                                    <h1 class="font-montserrat_b text-2xl lg:text-2xl font-bold mb-7">{{ $product->name }}</h1>
                                    <div class="product__details font-montserrat text-white text-xl mb-2">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="page__product-info-bottom mt-auto">
                                    <div class="page__product-info-price text-white font-montserrat_b text-3xl">
                                        @if($product->isShowPrice())
                                            {{ $product->getPrice() }}
                                            <span class="page__product-info-price-sign pl-1">&#8372;</span>
                                        @else
                                            <span class="text-2xl">
                                                {{ __(key: 'general.on_request') }}
                                            </span>
                                        @endif
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
                        <h2 class="text-xl font-bold mb-6">{{ __(key: 'general.main_characters') }}</h2>

                        {!! $product->full_info !!}
                    </div>
                </section>

                <!-- Related Products -->
                <section class="page__product-related container mx-auto px-4 my-12 lg:py-12">
                    <h2 class="font-montserrat_sb text-3xl">{{ __(key: 'general.related_products') }}</h2>
                    @if($relatedProducts)
                        <div class="page__product-related-slider swiper grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                            <div class="swiper-wrapper max-h-[350px] px-7 py-4">
                                @foreach ($relatedProducts as $product)
                                    <div class="page__product-related-item swiper-slide flex flex-col p-5 text-center relative font-montserrat_b h-full max-w-[250px] sm:max-w-full">
                                        <div class="page__product-related-item-status absolute top-5 left-5 text-xs text-lightblue-500">
                                            {{ $product->getStockStatus() }}
                                        </div>
                                        <div class="relative w-full h-48 overflow-hidden mb-2">
                                            <img src="{{ $product->getImageUrlBySize() }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <p class="text-lg text-white flex-grow">{{ $product->name }}</p>
                                        <div class="flex justify-between items-center mt-auto w-full space-x-2">
                                            <div class="page__product-related-item-price text-white text-lg w-1/2 text-left">
                                                2 350<span class="page__product-related-item-price-sign pl-1">&#8372;</span>
                                            </div>
                                            <a href="{{ route('products.item', ['product' => $product]) }}" class="bg-accent-500 text-white text-xs w-1/2 py-2 rounded">{{ __(key: 'general.button.more_details') }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
@stop

@section('extended_scripts')
    @parent

    @vite(['resources/js/pages/product.js'])
@stop
