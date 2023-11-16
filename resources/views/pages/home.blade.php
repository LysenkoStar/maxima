@extends('layout/base_page')

@section('title', 'Page Title')

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
                   <button>{{ __('View products') }}</button>
                   <button>{{ __('Submit application') }}</button>
                </div>
            </div>
        </div>
    </section>

    <div class="section section__offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-start">
                    <div class="section__title">{{ __('Why us') }}</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4 mb-sm-2 mb-md-0">
                    <div class="offer">
                        <div class="offer__image">
                            <svg class="icon icon-cup ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#cup"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase">{{ __('Quality assurance') }}</div>
                        <div class="offer__info">{{ __('Modern technologies') }}.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4 mb-sm-2 mb-md-0">
                    <div class="offer">
                        <div class="offer__image">
                            <svg class="icon icon-watch ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#watch"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase">{{ __('Work on time') }}</div>
                        <div class="offer__info">{{ __('Work quickly') }}.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4 mb-sm-2 mb-md-0">
                    <div class="offer">
                        <div class="offer__image">
                            <svg class="icon icon-people ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#people"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase">{{ __('Team of professionals') }}</div>
                        <div class="offer__info">{{ __('Specialists take details') }}.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4 mb-sm-2 mb-md-0">
                    <div class="offer">
                        <div class="offer__image">
                            <svg class="icon icon-pig ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#pig"></use>
                            </svg>
                        </div>
                        <div class="offer__title uppercase">{{ __('Nice prices') }}</div>
                        <div class="offer__info">{{ __('Surprise prices') }}.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section__production">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-start">
                    <div class="section__title">{{ __('Products') }}</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category">
                        <a class="category__link" href="#">
                            <div class="category__image"><img class="img-fluid" src="{{ asset('images/hero.jpg') }}" alt=""></div>
                            <div class="category__title">Опоры трубопроводов</div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category">
                        <a class="category__link" href="#">
                            <div class="category__image"><img class="img-fluid" src="./static/images/content/product_2.png" alt=""></div>
                            <div class="category__title">Сальники</div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category">
                        <a class="category__link" href="#">
                            <div class="category__image">
                                <img class="img-fluid" src="./static/images/content/product_3.png" alt="">
                            </div>
                            <div class="category__title">Блоки пружинные</div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category"><a class="category__link" href="#">
                            <div class="category__image"><img class="img-fluid" src="./static/images/content/product_1.png" alt=""></div>
                            <div class="category__title">Запчасти Ж/Д</div></a></div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category"><a class="category__link" href="#">
                            <div class="category__image"><img class="img-fluid" src="./static/images/content/product_2.png" alt=""></div>
                            <div class="category__title">Колонки управления задвижками</div></a></div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="category"><a class="category__link" href="#">
                            <div class="category__image"><img class="img-fluid" src="./static/images/content/product_3.png" alt=""></div>
                            <div class="category__title">Нестандартные изделия</div></a></div>
                </div>
            </div>
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
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">ТОКАРНЫЕ РАБОТЫ</div>
                        <div class="service__text">В Maxima доступно индивидуальное исполнение токарных работ по образцам или чертежам клиентов.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">ФРЕЗЕРНЫЕ РАБОТЫ</div>
                        <div class="service__text">Компания Maxima предлагает все виды токарно-фрезерных работ любой сложности.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">СВАРОЧНЫЕ РАБОТЫ</div>
                        <div class="service__text">Мы предлагаем доступные цены, кратчайшие сроки выполнения, высокую точность и надёжность готовых конструкций.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">ШЛИФОВКА</div>
                        <div class="service__text">Компания Maxima осуществляет шлифовальную обработку изделий из любых металлов и любой геометрической формы.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">ЛАЗЕРНАЯ ПОРЕЗКА</div>
                        <div class="service__text">Мы работаем на современном лазерном оборудовании, благодаря чему можем создавать детали любых форм, габаритов и сложности.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">ЗУБОНАРЕЗКА</div>
                        <div class="service__text">В работе мы используем только современные токарные станки с ЧПУ, что позволяет оптимизировать производство, сделав его максимально быстрым и точным.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">СТАЛЬНОЕ ЛИТЬЕ</div>
                        <div class="service__text">Компания Maxima предлагает услуги по литью стальных деталей любой конфигурации.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="service">
                        <div class="service__image">
                            <svg class="icon icon-ruler ">
                                <use xlink:href="static/images/sprite/symbol/sprite.svg#ruler"></use>
                            </svg>
                        </div>
                        <div class="service__title">АЛЮМИНИЕВОЕ ЛИТЬЕ</div>
                        <div class="service__text">Фирма Maxima предлагает услуги по алюминиевому литью деталей и заготовок. Наши специалисты способны справиться с самой сложной задачей.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section__delivery">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-start">
                    <div class="section__title">{{ __('Payment and delivery') }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="delivery__text">
                        <p>Lorem ipsum — классический текст-«рыба» (условный, зачастую бессмысленный текст-заполнитель, вставляемый в макет страницы). Является искажённым отрывком из философского трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на латинском языке, обнаружение сходства приписывается Ричарду МакКлинтоку[1].</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="delivery__action text-white"><a class="btn btn-outline-light btn-lg m-2 accent-button header__accent-button" href="#" role="button" rel="nofollow" target="_blank">Посмотреть Продукцию</a><a class="btn btn-outline-light btn-lg m-2 outline-accent-button header__outline-accent-button" href="#" role="button" rel="nofollow" target="_blank">Оставить заявку</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section__about" style="background-image: url('/static/images/common/about_us_bg.png');">
        <div class="about__container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-start">
                        <div class="section__title">{{ __('About Us') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="about__text">
                            <p><strong>Maxima</strong> – это постоянно развивающаяся компания, основанная более 8 лет назад в Харькове. За это время мы наработали колоссальный опыт в области металлообработки, создавая детали любой конфигурации из различных типов сырья. В нашем штате работают квалифицированные специалисты, знающие толк в создании качественных и точных деталей, понимающие все тонкости производственного процесса.</p>
                            <p>Изготовление деталей осуществляется на самом современном и качественном оборудовании (токарные станки, фрезеры, литейные аппараты и т.д.), благодаря чему нам удаётся создавать изделия, полностью соответствующие вашим требованиям. Контроль качества осуществляется на каждом этапе производства, что исключает огрехи и дефекты. Мы также гарантируем стабильные механические свойства продукции.</p>
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
