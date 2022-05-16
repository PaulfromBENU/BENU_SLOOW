<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Social networks data -->
        @yield('og-metadata-top')

        <!-- Page title and description -->
        <title>@yield('title-top') | BENU SLO0W</title>
        <meta charset="utf-8" name="description" content="@yield('description-top')">

        <!-- Search Engines visibility -->
        <meta name="robots" content="@yield('robots-behaviour-top')" />
        <meta name="keywords" content="@yield('seo-keywords-top')" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('static/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('static/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('static/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('static/favicon/safari-pinned-tab.svg') }}" color="#f9941d">

        <meta name="msapplication-TileColor" content="#f9941d">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 

        <!-- Favicon -->

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/tailwindcss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        @yield('more-styles')

        <!-- Font awesome icons -->
        <script src="https://kit.fontawesome.com/983b1bd0fa.js" crossorigin="anonymous"></script>

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Stripe -->
        <!-- <script src="https://js.stripe.com/v3/"></script> -->

        <!-- Google Data -->
    </head>

    <body class="antialiased overflow-x-hidden">
        <div class="min-h-screen">
            <!-- Page header -->
            @yield('header')

            <!-- Modals -->
            @yield('modals')

            <div class="content-wrapper">
                <!-- Page Content -->
                <main>
                    @yield('main-content-top')
                </main>

                <!-- Footer -->
                @yield('footer')

                <!-- Sticky bottom nav bar for mobiles -->
                <div class="welcome-mobile-nav mobile-only flex justify-around">
                    <div>
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="header__main-menu__icons__btn">
                            @svg('calendar', '')
                        </a>
                    </div>
                    <div>
                        <button onclick="document.getElementById('reservation-anchor-mobile').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-menu__icons__btn">
                            @svg('calendar', '')
                        </button>
                    </div>
                    <div>
                        <button onclick="document.getElementById('contact-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="header__main-menu__icons__btn">
                            @svg('benu-icon-mail-contact', '')
                        </button>
                    </div>
                </div>

                <!-- Side menu for mobile -->
                <div id="side-mobile" class="side-mobile mobile-only benu-container">
                    <ul class="side-mobile__links">
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}">Accueil</a></li>
                        <li><a href="#">Partie 1</a></li>
                        <li><a href="#">Partie 2</a></li>
                        <li><a href="#">Partie 3</a></li>
                    </ul>
                    <div class="mb-5">
                        <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="btn-couture-plain btn-couture-plain--fit inline-block" style="margin-left: 0px; width: 100%; border-radius: 8px;">Inscris-toi à la newsletter</a>
                    </div>
                    <div class="flex justify-start pt-5">
                        <a href="#" class="footer__social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer__social"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="footer__social"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @livewireScripts
        @yield('scripts-top')
    </body>
</html>
