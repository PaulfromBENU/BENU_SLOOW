<header class="header-group">
    <div class="header benu-container flex">
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
                </nav>
                <div class="header__newsletter-btn mobile-hidden">
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
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="header__main-nav__link inline-block">< {{ __('header.back-to-home') }}</a>
                </nav>
                <nav class="mobile-only">
                    <div>
                        <a href="{{ route('home', [app()->getLocale()]) }}" class="header__home-title">BENU SLO0W</a>
                    </div>
                </nav>
                <ul class="header__main-menu__icons flex justify-end">
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
