<!-- Footer -->
<footer class="footer">
    <div class="footer__nav-content py-14">
        <div class="container">
            <nav class="footer__nav mb-14">
                <ul class="nav menu footer__menu flex flex-col gap-y-6 text-center font-montserrat_b text-base text-darkblue-500 md:text-left md:justify-between md:flex-row md:gap-x-8 lg:flex-row lg:justify-start lg:gap-x-6">
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.home')])>
                        <a class="" aria-current="page" href="{{ route('page.home') }}">{{ __('Home') }}</a>
                    </li>
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.products')])>
                        <a class="" href="{{ route('page.products') }}">{{ __('Products') }}</a>
                    </li>
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.services')])>
                        <a class="" href="{{ route('page.services') }}">{{ __('Services') }}</a>
                    </li>
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.about')])>
                        <a class="" href="{{ route('page.about') }}"> {{ __('About Us') }}</a>
                    </li>
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.payment-and-delivery')])>
                        <a class="" href="{{ route('page.payment-and-delivery') }}">{{ __('Payment and delivery') }}</a>
                    </li>
                    <li @class(['footer__menu-item', 'transition-colors', 'hover:text-accent-500', 'menu__item_active' => request()->routeIs('page.contacts')])>
                        <a class="" href="{{ route('page.contacts') }}">{{ __('Contacts') }}</a>
                    </li>
                </ul>
            </nav>
            <div class="footer__info flex flex-wrap text-center gap-y-4 sm:gap-y-5 lg:gap-y-10 md:justify-between md:text-left lg:justify-normal xl:gap-y-32">
                <div class="footer__info-block basis-full sm:basis-1/2 md:basis-1/4">
                    <div class="footer__info-title font-open_sans_sb text-darkblue-500 mb-2.5 md:text-base lg:text-lg">
                        <h6>{{ __('Schedule') }}:</h6>
                    </div>
                    <div class="footer__info-text font-open_sans text-darkblue-500 md:text-base lg:text-lg">
                        <p class="footer__info-string">{{ __('Mon-Sat: :time', ['time' => '08:00-17:00']) }}</p>
                        <p class="footer__info-string">{{ __('Sun') }}: {{ __('Day off') }}</p>
                    </div>
                </div>
                <div class="footer__info-block basis-full sm:basis-1/2 md:basis-1/4">
                    <div class="footer__info-title font-open_sans_sb text-darkblue-500 mb-2.5 md:text-base lg:text-lg">
                        <h6>{{ __('Phone') }}:</h6>
                    </div>
                    <div class="footer__info-text font-open_sans text-darkblue-500 md:text-base lg:text-lg">
                        <a class="footer__info-link block" href="tel:0952252535">+38 (095) 225 25 35</a>
                        <a class="footer__info-link block" href="tel:0675760108">+38 (067) 576 01 08</a>
                    </div>
                </div>
                <div class="footer__info-block basis-full sm:basis-1/2 md:basis-1/4">
                    <div class="footer__info-title font-open_sans_sb text-darkblue-500 mb-2.5 md:text-base lg:text-lg">
                        <h6>E-mail:</h6>
                    </div>
                    <div class="footer__info-text font-open_sans text-darkblue-500 md:text-base lg:text-lg">
                        <a class="footer__info-link" href="mailto:npomaxima@mail.ru">npomaxima@mail.ru</a>
                    </div>
                </div>
                <div class="footer__info-block basis-full sm:basis-1/2 md:basis-1/4">
                    <div class="footer__info-title font-open_sans_sb text-darkblue-500 mb-2.5 md:text-base lg:text-lg">
                        <h6>{{ __('Address') }}:</h6>
                    </div>
                    <div class="footer__info-text font-open_sans text-darkblue-500 md:text-base lg:text-lg">
                        <p class="footer__info-string">{{ __('Full address') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__map-content">

    </div>
</footer>
<!-- Footer -->
