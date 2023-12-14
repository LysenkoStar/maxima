@extends('layout/base_page')

@section('extended_styles')
    @parent

    @vite([
        'resources/scss/pages/main.scss',
    ])
@show

@section('content')
    <section class="hero relative h-screen bg-[url('../../public/images/hero.jpg')] bg-cover bg-fixed bg-center bg-no-repeat">
        <div class="hero__container flex h-screen items-center justify-center bg-black bg-opacity-40">
            <div class="container">
                <div
                    class="hero__text max-w-2xl"
                    style="background: radial-gradient(50% 45% at 51.88% 41.96%, rgba(0, 0, 0, 0.9) 25.52%, rgba(0, 0, 0, 0) 100%)">
                    <h1
                        class="mb-4 font-montserrat_b text-2xl font-extrabold leading-none tracking-tight text-white sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl 2xl:text-4xl">
                        {{ __('Specialized production') }}
                    </h1>
                    <p class="mb-6 max-w-xl text-base font-light text-white md:text-lg">{{ __('High-quality products') }}</p>

                    <a href="#" class="btn btn-primary mr-6 bg-accent-500 filter" style="box-shadow: 0 9px 30px 0 rgba(255, 148, 0, 0.3);">{{ __('View products') }}</a>
                    <a href="#" class="btn btn-outline bg-accent-500 border-accent-500 text-accent-500">{{ __('Submit application') }}</a>
                </div>
            </div>
        </div>
    </section>

    <div class="section section__offer">
        <div class="container">
            <div class="section__title">{{ __('Why us') }}</div>
            <div class="block md:grid sm:grid-cols-4 sm:gap-12 mt-7">
                <div class="block md:flex justify-center mb-7 md:mb-0">
                    <div class="offer">
                        <div class="offer__image w-20 h-20 mb-7">
                            <svg class="icon icon-cup h-full w-full fill-lightblue-500">
                                <use xlink:href="{{ asset('images/sprite.svg') }}#cup"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase font-montserrat_sb text-lg leading-5 mb-2.5">{{ __('Quality assurance') }}</div>
                        <div class="offer__info font-montserrat text-lg leading-5">{{ __('Modern technologies') }}.</div>
                    </div>
                </div>
                <div class="block md:flex justify-center mb-7 md:mb-0">
                    <div class="offer">
                        <div class="offer__image w-20 h-20 mb-7">
                            <svg class="icon icon-watch h-full w-full fill-lightblue-500">
                                <use xlink:href="{{ asset('images/sprite.svg') }}#watch"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase font-montserrat_sb text-lg leading-5 mb-2.5">{{ __('Work on time') }}</div>
                        <div class="offer__info font-montserrat text-lg leading-5">{{ __('Work quickly') }}.</div>
                    </div>
                </div>
                <div class="block md:flex justify-center mb-7 md:mb-0">
                    <div class="offer">
                        <div class="offer__image w-20 h-20 mb-7">
                            <svg class="icon icon-people h-full w-full fill-lightblue-500">
                                <use xlink:href="{{ asset('images/sprite.svg') }}#people"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase font-montserrat_sb text-lg leading-5 mb-2.5">{{ __('Team of professionals') }}</div>
                        <div class="offer__info font-montserrat text-lg leading-5">{{ __('Specialists take details') }}.</div>
                    </div>
                </div>
                <div class="block md:flex justify-center mb-7 md:mb-0">
                    <div class="offer">
                        <div class="offer__image w-20 h-20 mb-7">
                            <svg class="icon icon-pig h-full w-full fill-lightblue-500">
                                <use xlink:href="{{ asset('images/sprite.svg') }}#pig"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase font-montserrat_sb text-lg leading-5 mb-2.5">{{ __('Nice prices') }}</div>
                        <div class="offer__info font-montserrat text-lg leading-5">{{ __('Surprise prices') }}.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section__production">
        <div class="container">
            <div class="section__title">{{ __('Products') }}</div>
            @if ($categories)
                <div class="block md:grid md:grid-cols-3 lg:grid-cols-4 sm:gap-8 mt-7">
                    @foreach ($categories as $category)
                        <div class="block md:flex justify-center mb-7 md:mb-0">
                            <div class="category w-full">
                                <a class="category__link p-5 text-center" href="{{ route('products.by.category', ['category' => $category]) }}">
                                    <div class="category__image">
                                        <img class="max-h-48 m-auto" src="{{ asset('images/products/product_1.png') }}" alt="{{ $category->name }}">
                                    </div>
                                    <div class="category__title font-montserrat_b text-lg">{{ $category->name }}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="section section__services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-start">
                    <div class="section__title">{{ __('Services') }}</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="md:grid sm:grid-cols-4 sm:gap-6">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">ТОКАРНЫЕ РАБОТЫ</div>
                            <div class="service__text font-montserrat text-lg">В Maxima доступно индивидуальное исполнение токарных работ по образцам или чертежам клиентов.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">ФРЕЗЕРНЫЕ РАБОТЫ</div>
                            <div class="service__text font-montserrat text-lg">Компания Maxima предлагает все виды токарно-фрезерных работ любой сложности.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">СВАРОЧНЫЕ РАБОТЫ</div>
                            <div class="service__text font-montserrat text-lg">Мы предлагаем доступные цены, кратчайшие сроки выполнения, высокую точность и надёжность готовых конструкций.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">ШЛИФОВКА</div>
                            <div class="service__text font-montserrat text-lg">Компания Maxima осуществляет шлифовальную обработку изделий из любых металлов и любой геометрической формы.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">ЛАЗЕРНАЯ ПОРЕЗКА</div>
                            <div class="service__text font-montserrat text-lg">Мы работаем на современном лазерном оборудовании, благодаря чему можем создавать детали любых форм, габаритов и сложности.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">ЗУБОНАРЕЗКА</div>
                            <div class="service__text font-montserrat text-lg">В работе мы используем только современные токарные станки с ЧПУ, что позволяет оптимизировать производство, сделав его максимально быстрым и точным.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">СТАЛЬНОЕ ЛИТЬЕ</div>
                            <div class="service__text font-montserrat text-lg">Компания Maxima предлагает услуги по литью стальных деталей любой конфигурации.</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="service">
                            <div class="service__image w-20 h-20 mb-7">
                                <svg class="icon icon-ruler h-full w-full fill-lightblue-500">
                                    <use xlink:href="{{ asset('images/sprite.svg') }}#ruler"></use>
                                </svg>
                            </div>
                            <div class="service__title text-lightblue-500 font-montserrat_sb uppercase text-lg">АЛЮМИНИЕВОЕ ЛИТЬЕ</div>
                            <div class="service__text font-montserrat text-lg">Фирма Maxima предлагает услуги по алюминиевому литью деталей и заготовок. Наши специалисты способны справиться с самой сложной задачей.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section__delivery">
        <div class="container">
            <div class="section__title">{{ __('Payment and delivery') }}</div>
            <div class="delivery__text">
                <p>Lorem ipsum — классический текст-«рыба» (условный, зачастую бессмысленный текст-заполнитель, вставляемый в макет страницы). Является искажённым отрывком из философского трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на латинском языке, обнаружение сходства приписывается Ричарду МакКлинтоку[1].</p>
            </div>
            <div class="delivery__action text-white mt-10 text-center sm:text-left">
                <a class="btn btn-primary mr-6 bg-accent-500 filter" style="box-shadow: 0 9px 30px 0 rgba(255, 148, 0, 0.3);" href="#" role="button" rel="nofollow" target="_blank">{{ __('View products') }}</a>
                <a class="btn btn-outline bg-accent-500 border-accent-500 text-accent-500" href="#" role="button" rel="nofollow" target="_blank">{{ __('Submit application') }}</a>
            </div>
        </div>
    </div>
    <div class="section section__about bg-[url('../../public/images/about_us_bg.png')]">
        <div class="about__container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-start">
                        <div class="section__title">{{ __('About Us') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="about__text font-montserrat sm:text-base md:text-xl lg:text-2xl indent-5">
                            <p class="pb-5"><strong class="font-montserrat_b">{{ __('Maxima') }}</strong> – {{ __('About first') }}</p>
                            <p>{{ __('About second') }}</p>
                        </div>
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
