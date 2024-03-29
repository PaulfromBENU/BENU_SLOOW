<header class="header-group">
    <div class="header benu-container flex justify-start">
        <div id="mobile-menu-btn" class="mobile-only header__hamburger">
            <button>
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <a class="header__logo-container" href="{{ route('home', [app()->getLocale()]) }}">
            @svg('logo_benu_sloow', 'header__logo header__logo--desktop')
            <!-- <img src="{{ asset('images/svg/logo_benu_sloow.svg') }}" class="header__logo header__logo--desktop"> -->
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--scroll">
            <img src="{{ asset('images/svg/benu-icon-menu-scroll.svg') }}" class="header__logo header__logo--mobile">
        </a>
        <div class="header__menus-container">
            <div class="flex justify-between header__top-menu mobile-hidden">
                <nav class="header__top-nav flex justify-start">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU SLO0W</a>
                    </div>
                    <!-- <ul class="flex justify-start header__top-nav__links">
                        <li>
                            <a href="#">{{ __('header.story') }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">{{ __('header.partners') }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">{{ __('header.vouchers') }}</a>
                        </li>
                    </ul> -->
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
                <nav class="header__main-nav flex justify-start mobile-hidden">
                    <a onclick="document.getElementById('host-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-nav__link inline-block">{{ __('header.title-1') }}</a>

                    <a onclick="document.getElementById('reservation-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-nav__link inline-block">{{ __('header.title-2') }}</a>

                    <a href="https://linktr.ee/benuvillage?fbclid=PAAaZgO9AHCk-2tMi7aV6dQo-3JMH7k1uKIoCGn2WulIcezR7KA-64ETKuWG4" target="_blank" class="header__main-nav__link inline-block">MENU</a>

                    <a onclick="document.getElementById('faq-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-nav__link inline-block">{{ __('header.title-3') }}</a>

                    <a onclick="document.getElementById('contact-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-nav__link inline-block">{{ __('header.title-4') }}</a>

                    
                </nav>
                <nav class="mobile-only">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU SLO0W</a>
                    </div>
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
                        <!-- <li>
                            <a href="#" class="header__main-menu__icons__btn">
                                
                            </a>
                        </li> -->
                    @endauth
                    @guest
                        <!-- li>
                            <a class="header__main-menu__icons__btn" id="connect-btn">
                                
                            </a>
                        </li> -->
                    @else
                        <!-- <li>
                            <a href="#" class="header__main-menu__icons__btn" id="dashboard-btn">
                                
                            </a>
                        </li> -->
                    @endguest
                    <li class="mobile-hidden">
                        <button onclick="document.getElementById('reservation-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-menu__icons__btn">
                            @svg('calendar', '')
                        </button>
                    </li>
                    <li class="mobile-hidden">
                        <button onclick="document.getElementById('contact-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-menu__icons__btn">
                            @svg('benu-icon-mail-contact', '')
                        </button>
                    </li>
                    <li class="header__main-menu__icons__lang-container">
                        <button class="header__main-menu__icons__lang-btn" id="lang-selector">
                            {{ strtoupper(app()->getLocale()) }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
