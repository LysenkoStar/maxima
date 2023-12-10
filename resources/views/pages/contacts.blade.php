@extends('layout/base_page')

@section('title', __('Contacts'))

@section('extended_styles')
    @parent
@show

@section('content')
    <div class="container my-12">
        <div class="page page__contact">
            <!-- Breadcrumbs -->
            {{ Breadcrumbs::render('contacts') }}
            <!-- Breadcrumbs -->

            <div class="page__content mt-16 mb-24">
                <h1 class="page__content-title mb-12 font-montserrat_b text-4xl text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                    {{__('Contacts') }}
                </h1>
                <div class="page__content-main">
                    <div class="flex flex-wrap text-center gap-y-4 mb-24 sm:gap-y-5 lg:gap-y-10 md:justify-between md:text-left lg:justify-normal xl:gap-y-32">
                        <div class="basis-full sm:basis-1/2 md:basis-1/4">
                            <div class="footer__info-title font-open_sans_sb text-lightblue-500 mb-2.5 md:text-base lg:text-lg">
                                <h6>{{ __('Schedule') }}:</h6>
                            </div>
                            <div class="font-open_sans text-silver-800 md:text-base lg:text-lg">
                                <p class="">{{ __('Mon-Sat: :time', ['time' => '08:00-17:00']) }}</p>
                                <p class="">{{ __('Sun') }}: {{ __('Day off') }}</p>
                            </div>
                        </div>
                        <div class="footer__info-block basis-full sm:basis-1/2 md:basis-1/4">
                            <div class="font-open_sans_sb text-lightblue-500 mb-2.5 md:text-base lg:text-lg">
                                <h6>{{ __('Phone') }}:</h6>
                            </div>
                            <div class="font-open_sans text-silver-800 md:text-base lg:text-lg">
                                <a class="block" href="tel:0952252535">+38 (095) 225 25 35</a>
                                <a class="block" href="tel:0675760108">+38 (067) 576 01 08</a>
                            </div>
                        </div>
                        <div class="basis-full sm:basis-1/2 md:basis-1/4">
                            <div class="font-open_sans_sb text-lightblue-500 mb-2.5 md:text-base lg:text-lg">
                                <h6>E-mail:</h6>
                            </div>
                            <div class="font-open_sans text-silver-800 md:text-base lg:text-lg">
                                <a class="" href="mailto:npomaxima@mail.ru">npomaxima@mail.ru</a>
                            </div>
                        </div>
                        <div class="basis-full sm:basis-1/2 md:basis-1/4">
                            <div class="font-open_sans_sb text-lightblue-500 mb-2.5 md:text-base lg:text-lg">
                                <h6>{{ __('Address') }}:</h6>
                            </div>
                            <div class="font-open_sans text-silver-800 md:text-base lg:text-lg">
                                <p class="">{{ __('Full address') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="page__contact-form">
                        <h2 class="mb-12 font-montserrat_b text-3xl text-silver-800 sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                            {{ __('Send us a request') }}
                        </h2>
                        <form method="POST" action="/profile">
                            @csrf

                            <div class="mt-10 grid gap-x-6 gap-y-8 grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
                                <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1">
                                    <label for="first-name" class="block text-base font-montserrat leading-6 text-silver-800">
                                        {{ __('Name') }}
                                    </label>
                                    <div class="mt-2">
                                        <input type="text"
                                               name="first-name"
                                               id="first-name"
                                               autocomplete="given-name"
                                               class="block w-full rounded border-[1px] border-silver-800 bg-transparent p-2 text-sm outline-none focus:border-lightblue-500">
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1">
                                    <label for="phone" class="block text-base font-montserrat leading-6 text-silver-800">
                                        {{ __('Phone') }}
                                    </label>
                                    <div class="mt-2">
                                        <input type="text"
                                               name="phone"
                                               id="phone"
                                               autocomplete="given-name"
                                               class="block w-full rounded border-[1px] border-silver-800 bg-transparent p-2 text-sm outline-none focus:border-lightblue-500">
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1">
                                    <label for="email" class="block text-base font-montserrat leading-6 text-silver-800">
                                        {{ __('Email') }}
                                    </label>
                                    <div class="mt-2">
                                        <input type="email"
                                               name="email"
                                               id="email"
                                               autocomplete="given-name"
                                               class="block w-full rounded border-[1px] border-silver-800 bg-transparent p-2 text-sm outline-none focus:border-lightblue-500">
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-2">
                                    <label for="message" class="block text-base font-montserrat leading-6 text-silver-800">
                                        {{ __('Message') }}
                                    </label>
                                    <div class="mt-2">
                                        <textarea id="message" name="message" rows="3" class="block w-full rounded border-[1px] border-silver-800 bg-transparent p-2 text-sm outline-none focus:border-lightblue-500"></textarea>
                                    </div>
                                    <p class="mt-3 text-xl font-montserrat italic text-silver-800">* - {{ __('Required fields') }}</p>
                                </div>
                                <div class="sm:col-span-1 md:col-span-2 lg:col-span-1 flex items-center">
                                    <label for="fileInput" class="block cursor-pointer text-base font-montserrat leading-6 text-silver-800 hover:text-lightblue-500">
                                        <svg class="icon icon-clip h-9 w-9 fill-silver-800 inline-block">
                                            <use xlink:href="{{ asset('images/sprite.svg') }}#clip"></use>
                                        </svg>
                                        {{ __('Attach file') }}
                                    </label>
                                    <input type="file" id="fileInput" name="fileInput" class="hidden">
                                </div>
                                <div class="col-span-2 text-center lg:text-left">
                                    <button type="submit" class="btn btn-outline font-montserrat_b text-base bg-accent-500 border-accent-500 text-accent-500" style="box-shadow: 0 8px 20px 0 rgba(255, 148, 0, 0.2);">
                                        {{ __('Submit application') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('extended_scripts')
    @parent

    <script src="static/js/main.js"></script>
@stop
