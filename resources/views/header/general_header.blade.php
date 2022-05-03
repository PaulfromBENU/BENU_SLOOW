<header class="header-group">
    <div class="header benu-container flex">
        <a class="header__logo-container" href="{{ route('home', [app()->getLocale()]) }}">
            <img src="{{ asset('images/svg/logo_benu_couture.svg') }}" class="header__logo header__logo--desktop">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--scroll">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--mobile">
        </a>
        <div class="header__menus-container">
            <div class="flex justify-between header__top-menu">
                <nav class="header__top-nav flex justify-start">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU SLO0W</a>
                    </div>
                    <ul class="flex justify-start header__top-nav__links">
                        <li>
                            <a href="{{ route('full-story-'.app()->getLocale()) }}">{{ __('header.story') }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="{{ route('partners-'.app()->getLocale()) }}">{{ __('header.partners') }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="{{ route('vouchers-'.app()->getLocale()) }}">{{ __('header.vouchers') }}</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__newsletter-btn">
                    @guest
                    <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                        {{ __('header.newsletter') }}
                    </a>
                    @else
                        @if(auth()->user()->newsletter == '0')
                        <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                            {{ __('header.newsletter') }}
                        </a>
                        @else
                        <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="header__newsletter-btn__link">
                            {{ __('header.newsletter-unsubscribe') }}
                        </a>
                        @endif
                    @endguest
                </div>
            </div>
            <div class="flex justify-between header__main-menu">
                <nav class="header__main-nav flex justify-start">
                    <div>
                        <button class="header__main-nav__btn" type="button">
                            @svg('benu-icon-squares-categories', 'header__main-nav__btn--logo-1')
                            {{ __('header.creations') }}
                            @svg('benu-icon-arrow-down', 'header__main-nav__btn--logo-2')
                        </button>
                    </div>
                    <a href="{{ route('news-'.app()->getLocale()) }}" class="header__main-nav__link">{{ __('header.news') }}</a>

                    <a href="{{ route('about-'.app()->getLocale()) }}" class="header__main-nav__link">{{ __('header.about') }}</a>

                    <a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="header__main-nav__link">{{ __('header.locations') }}</a>
                </nav>
                <ul class="header__main-menu__icons flex justify-end">
                    @if(1 == 0)
                    <li>
                        <button class="header__main-menu__icons__btn" id="general-search-btn">
                            @svg('benu-icon-magnifying-glass-search')
                        </button>
                    </li>
                    @endif
                    @auth
                        <li>
                            <a href="{{ route('dashboard', ['locale' => app()->getLocale(), 'section' => 'wishlist']) }}" class="header__main-menu__icons__btn">
                                @svg('benu-icon-heart-favorites', '')
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a class="header__main-menu__icons__btn" id="connect-btn">
                                @svg('benu-icon-silhouette-connect')
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('dashboard', ['section' => 'overview']) }}" class="header__main-menu__icons__btn" id="dashboard-btn">
                                @svg('benu-icon-silhouette-disconnect')
                            </a>
                        </li>
                    @endguest
                    <li>
                        <button class="header__main-menu__icons__lang-btn" id="lang-selector">
                            {{ strtoupper(app()->getLocale()) }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
