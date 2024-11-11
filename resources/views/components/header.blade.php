<!-- Header -->
<header
    @class([
        'absolute' => request()->routeIs('page.home'),
        'inset-x-0',
        'top-0',
        'pt-3',
        'z-10'
    ])
    style="background: linear-gradient(180deg, #000 46.41%, rgba(25, 24, 31, 0) 100%)">
    <div class="container">
        <nav class="flex items-center justify-between lg:gap-x-3 xl:gap-x-0 2xl:gap-x-3">
            <figure class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ __('general.Maxima') }}" />
            </figure>

            <div class="menu navigation hidden lg:block">
                <ul class="menu__list mb-7 flex gap-x-4 font-montserrat_b text-sm">
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.home')])>
                        <a href="{{ route('page.home') }}">{{ __('general.menu.home') }}</a>
                    </li>
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.products')])>
                        <a href="{{ route('page.products') }}">{{ __('general.menu.products') }}</a>
                    </li>
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.services')])>
                        <a href="{{ route('page.services') }}">{{ __('general.menu.services') }}</a>
                    </li>
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.about')])>
                        <a href="{{ route('page.about') }}">{{ __('general.menu.about_us') }}</a>
                    </li>
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.payment-and-delivery')])>
                        <a href="{{ route('page.payment-and-delivery') }}">{{ __('general.menu.payment_and_delivery') }}</a>
                    </li>
                    <li @class(['menu__list-item', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.contacts')])>
                        <a href="{{ route('page.contacts') }}">{{ __('general.menu.contacts') }}</a>
                    </li>
                </ul>

                <form action="{{ route('search') }}" method="GET">
                    <label class="relative">
                        <input
                            type="text"
                            class="w-full border-b bg-transparent bg-[url('../../public/images/icon_search.svg')] bg-auto border-none bg-left bg-no-repeat px-6 py-2 font-open_sans text-sm focus:outline-none focus:shadow-none focus:ring-offset-transparent"
                            style="background-size: 16px 16px; box-shadow: none;"
                            name="query"
                            autocomplete="off"
                            placeholder="{{ __('general.search') }}" />
                    </label>
                </form>
            </div>

            <div class="hidden text-center lg:block">
{{--                <a href="#" class="group relative mb-5 inline-block w-14">--}}
{{--                    <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">--}}
{{--                        <path--}}
{{--                            d="M29.7391 5.73178C29.5056 5.43274 29.1473 5.25797 28.7679 5.25797H5.31117L4.96249 1.3736C4.90546 0.738375 4.37309 0.251648 3.73535 0.251648H1.23207C0.551616 0.251648 0 0.803264 0 1.48372C0 2.16417 0.551616 2.71579 1.23207 2.71579H2.60894L3.95941 17.7611C3.9597 17.7788 3.95882 17.7962 3.95982 17.8141C3.96258 17.8614 3.96874 17.9076 3.9766 17.9531L4.026 18.5032C4.02694 18.5136 4.02799 18.524 4.02923 18.5342C4.17895 19.8314 4.84186 20.9554 5.80047 21.7147C5.30377 22.3491 5.00655 23.1467 5.00655 24.013C5.00655 26.0726 6.68223 27.7483 8.74184 27.7483C10.8015 27.7483 12.4772 26.0726 12.4772 24.013C12.4772 23.5668 12.3983 23.1388 12.2542 22.7418H18.9975C18.8533 23.1388 18.7745 23.5668 18.7745 24.013C18.7745 26.0726 20.4502 27.7483 22.5098 27.7483C24.5695 27.7483 26.2452 26.0726 26.2452 24.013C26.2452 21.9533 24.5695 20.2776 22.5098 20.2776H8.75017C7.81427 20.2776 6.99869 19.713 6.64667 18.8903L26.3368 17.7331C26.8744 17.7015 27.3292 17.3244 27.4598 16.802L29.9633 6.78878C30.0552 6.42081 29.9725 6.03088 29.7391 5.73178Z"--}}
{{--                            fill="white"--}}
{{--                            class="fill-white transition group-hover:fill-accent-500" />--}}
{{--                    </svg>--}}
{{--                    <div--}}
{{--                        class="absolute -right-0 -top-1 w-fit rounded-sm bg-accent-500 px-1 py-0 text-center font-montserrat_b text-xs">--}}
{{--                        0--}}
{{--                    </div>--}}
{{--                </a>--}}

                @include('partials/language_switcher')
            </div>

            <div class="relative hidden font-open_sans text-sm before:absolute before:-left-7 before:top-2 before:content-[url('../../public/images/icon_phone.svg')] lg:block">
                <div class="mb-2.5">
                    <a href="tel:380952252535" class="block">+38 (095) 225 25 35</a>
                    <a href="tel:380675760108" class="block">+38 (067) 576 01 08</a>
                </div>

                <p>{{ __('general.work_schedule', ['time' => '08:00-17:00']) }}</p>
                <p>{{ __('general.sunday') }}: {{ __('general.day_off') }}</p>
            </div>

            <!-- Mobile menu -->
            <div class="mobile_menu block lg:hidden">
                <button type="button" class="burger" title="Menu">
                    <span class="burger__bar burger__bar--1"></span>
                    <span class="burger__bar burger__bar--2"></span>
                    <span class="burger__bar burger__bar--3"></span>
                </button>
            </div>
            <!-- Mobile menu -->
        </nav>
    </div>
</header>

<!-- Mobile panel -->
<div class="sidebar hidden">
    <div class="sidebar__backdrop z-10"></div>
    <div class="sidebar__panel bg-darkblue-500">
        <nav class="relative">
            <figure class="logo mb-9">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ __('Maxima') }}" class="max-w-[100px]" />
            </figure>

            <ul class="sidebar__panel-nav fo font-montserrat_b">
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.home')])>
                    <a href="{{ route('page.home') }}">{{ __('general.menu.home') }}</a>
                </li>
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.products')])>
                    <a href="{{ route('page.products') }}">{{ __('general.menu.products') }}</a>
                </li>
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.services')])>
                    <a href="{{ route('page.services') }}">{{ __('general.menu.services') }}</a>
                </li>
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.about')])>
                    <a href="{{ route('page.about') }}">{{ __('general.menu.about_us') }}</a>
                </li>
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.payment-and-delivery')])>
                    <a href="{{ route('page.payment-and-delivery') }}">{{ __('general.menu.payment_and_delivery') }}</a>
                </li>
                <li @class(['mb-7', 'text-base', 'transition-colors', 'hover:text-accent-500', 'active' => request()->routeIs('page.contacts')])>
                    <a href="{{ route('page.contacts') }}">{{ __('general.menu.contacts') }}</a>
                </li>
            </ul>

{{--            <div class="absolute right-5 top-0">--}}
{{--                <a href="#" class="group relative mb-5 block">--}}
{{--                    <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">--}}
{{--                        <path--}}
{{--                            d="M29.7391 5.73178C29.5056 5.43274 29.1473 5.25797 28.7679 5.25797H5.31117L4.96249 1.3736C4.90546 0.738375 4.37309 0.251648 3.73535 0.251648H1.23207C0.551616 0.251648 0 0.803264 0 1.48372C0 2.16417 0.551616 2.71579 1.23207 2.71579H2.60894L3.95941 17.7611C3.9597 17.7788 3.95882 17.7962 3.95982 17.8141C3.96258 17.8614 3.96874 17.9076 3.9766 17.9531L4.026 18.5032C4.02694 18.5136 4.02799 18.524 4.02923 18.5342C4.17895 19.8314 4.84186 20.9554 5.80047 21.7147C5.30377 22.3491 5.00655 23.1467 5.00655 24.013C5.00655 26.0726 6.68223 27.7483 8.74184 27.7483C10.8015 27.7483 12.4772 26.0726 12.4772 24.013C12.4772 23.5668 12.3983 23.1388 12.2542 22.7418H18.9975C18.8533 23.1388 18.7745 23.5668 18.7745 24.013C18.7745 26.0726 20.4502 27.7483 22.5098 27.7483C24.5695 27.7483 26.2452 26.0726 26.2452 24.013C26.2452 21.9533 24.5695 20.2776 22.5098 20.2776H8.75017C7.81427 20.2776 6.99869 19.713 6.64667 18.8903L26.3368 17.7331C26.8744 17.7015 27.3292 17.3244 27.4598 16.802L29.9633 6.78878C30.0552 6.42081 29.9725 6.03088 29.7391 5.73178Z"--}}
{{--                            fill="white"--}}
{{--                            class="fill-white transition group-hover:fill-accent-500" />--}}
{{--                    </svg>--}}
{{--                    <div--}}
{{--                        class="absolute -right-2.5 -top-1 w-fit rounded-sm bg-accent-500 px-1 py-0 text-center font-montserrat_b text-xs">--}}
{{--                        10--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

            <div class="font-open_sans text-base">
                <div class="mb-2.5">
                    <a href="tel:380952252535" class="block">+38 (095) 225 25 35</a>
                    <a href="tel:380675760108" class="block">+38 (067) 576 01 08</a>
                </div>

                <p>{{ __('general.work_schedule', ['time' => '08:00-17:00']) }}</p>
                <p>{{ __('general.sunday') }}: {{ __('general.day_off') }}</p>
            </div>
        </nav>
    </div>
</div>
<!-- Header -->
