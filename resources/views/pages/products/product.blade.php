@extends('layout/base_page')

@section('title', __('Products'))

@section('extended_styles')
    @parent

    @vite([
      'resources/scss/pages/product.scss',
  ])
@show

@section('content')
    <div class="page page__product">
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('products') }}
        <!-- Breadcrumbs -->

        <div class="page__content mt-16 mb-24">
            <div class="page__content-main">
                <section class="page__product-details" x-data="{ activeTab: 'about' }">
                    <!-- Tabs Section -->
                    <div class="border-b-2 border-gray-700">
                        <nav class="flex space-x-4 -mb-[2px]">
                            <button @click="activeTab = 'about'"
                                    :class="{'text-accent-500 border-accent-500': activeTab === 'about', 'text-white border-transparent': activeTab !== 'about'}"
                                    class="tab-button text-base px-4 py-2 border-b-2 font-montserrat_m">ВСЕ О ТОВАРЕ</button>
                            <button @click="activeTab = 'characteristics'"
                                    :class="{'text-accent-500 border-accent-500': activeTab === 'characteristics', 'text-white border-transparent': activeTab !== 'characteristics'}"
                                    class="tab-button text-base px-4 py-2 border-b-2 font-montserrat_m">ХАРАКТЕРИСТИКИ</button>
                        </nav>
                    </div>

                    <!-- Tab Content -->
                    <div x-show="activeTab === 'about'" class="page__product-tab mt-6">
                        <!-- Content for "ВСЕ О ТОВАРЕ" -->
                        <div class="flex flex-col lg:flex-row">
                            <!-- Product Images -->
                            <div class="page__product-image lg:w-1/3 flex-shrink-0 justify-center">
                                <div class="product__image-main swiper block relative mb-7 h-72 flex items-center justify-center">
                                    <div class="product__status absolute top-5 left-5 font-montserrat_b text-xs text-lightblue-500">In stock</div>
                                    <div class="swiper-wrapper flex items-center justify-center h-full">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_1.png') }}" alt="Product" class="object-contain flex-shrink-0 m-auto">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_2.png') }}" alt="Product" class="object-contain flex-shrink-0 m-auto">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('images/products/product_3.png') }}" alt="Product" class="object-contain flex-shrink-0 m-auto">
                                        </div>
                                    </div>
                                </div>
                                <div thumbsSlider=""  class="product__image-secondary swiper flex space-x-2 grid grid-cols-4 gap-4">
                                    <div class="swiper-wrapper">
                                        <div class="product__image-secondary-item swiper-slide w-16 h-16 bg-darkslateblue-500 rounded-sm flex items-center justify-center overflow-hidden p-1">
                                            <img src="{{ asset('images/products/product_1.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide w-16 h-16 bg-darkslateblue-500 rounded-sm flex items-center justify-center overflow-hidden p-1">
                                            <img src="{{ asset('images/products/product_2.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                        <div class="product__image-secondary-item swiper-slide w-16 h-16 bg-darkslateblue-500 rounded-sm flex items-center justify-center overflow-hidden p-1">
                                            <img src="{{ asset('images/products/product_3.png') }}"
                                                 alt="Thumbnail"
                                                 class="object-contain w-full h-full">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="lg:w-2/3 lg:pl-8 mt-6 lg:mt-0 flex flex-col justify-between">
                                <div>
                                    <h1 class="text-2xl lg:text-4xl font-bold">Опоры ОПБ1 ГОСТ 14911-82</h1>
                                    <p class="mt-2 text-gray-300">
                                        Опоры подвижные безкорпусные ОПБ1 для крепления трубопроводов от Дн 18 до 530 мм.
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <p class="text-yellow-400 text-3xl font-semibold">1 000 ₴</p>
                                    <div class="flex space-x-4 mt-4">
                                        <button class="bg-yellow-500 text-black px-6 py-2 rounded">Заказать</button>
                                        <button class="border border-yellow-500 text-yellow-500 px-6 py-2 rounded">Рассчитать</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'characteristics'" class="page__product-tab mt-6">
                        <!-- Content for "ХАРАКТЕРИСТИКИ" -->
                        <h2 class="text-xl font-bold">Основные характеристики</h2>
                        <p class="text-gray-300 mt-2">
                            Опора подвижная безкорпусные ОПБ1 для крепления трубопроводов от Дн 18 до 530 мм.
                        </p>
                        <table class="w-full text-left mt-4">
                            <thead>
                            <tr class="bg-gray-800">
                                <th class="py-2 px-4 text-gray-300">Обозначение</th>
                                <th class="py-2 px-4 text-gray-300">Диаметр наружный, Дн</th>
                                <th class="py-2 px-4 text-gray-300">Вес, кг</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Sample rows, repeat as needed -->
                            <tr class="border-t border-gray-700">
                                <td class="py-2 px-4">ОПБ1-18</td>
                                <td class="py-2 px-4">18</td>
                                <td class="py-2 px-4">0,03</td>
                            </tr>
                            <!-- Additional rows... -->
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Related Products -->
                <section class="page__product-related container mx-auto px-4 py-6 lg:py-12">
                    <h2 class="text-xl font-bold">Похожие товары</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        <div class="bg-gray-800 p-4 rounded">
                            <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="w-full rounded mb-4">
                            <h3 class="text-lg">Опоры ОПП2 ГОСТ 14911-82</h3>
                            <p class="text-yellow-400 mt-2">2 350 ₴</p>
                            <button class="bg-yellow-500 text-black w-full mt-2 py-2 rounded">Заказать</button>
                        </div>
                        <!-- Repeat for other related products -->
                        <div class="bg-gray-800 p-4 rounded">
                            <img src="{{ asset('images/products/product_2.png') }}" alt="Related Product" class="w-full rounded mb-4">
                            <h3 class="text-lg">Опоры ОПП2 ГОСТ 14911-82</h3>
                            <p class="text-yellow-400 mt-2">2 350 ₴</p>
                            <button class="bg-yellow-500 text-black w-full mt-2 py-2 rounded">Заказать</button>
                        </div>
                        <div class="bg-gray-800 p-4 rounded">
                            <img src="{{ asset('images/products/product_3.png') }}" alt="Related Product" class="w-full rounded mb-4">
                            <h3 class="text-lg">Опоры ОПП2 ГОСТ 14911-82</h3>
                            <p class="text-yellow-400 mt-2">2 350 ₴</p>
                            <button class="bg-yellow-500 text-black w-full mt-2 py-2 rounded">Заказать</button>
                        </div>
                        <div class="bg-gray-800 p-4 rounded">
                            <img src="{{ asset('images/products/product_1.png') }}" alt="Related Product" class="w-full rounded mb-4">
                            <h3 class="text-lg">Опоры ОПП2 ГОСТ 14911-82</h3>
                            <p class="text-yellow-400 mt-2">2 350 ₴</p>
                            <button class="bg-yellow-500 text-black w-full mt-2 py-2 rounded">Заказать</button>
                        </div>

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
