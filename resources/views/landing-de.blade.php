<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/tailwindcss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style_landing_page.css') }}"> -->

        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/983b1bd0fa.js" crossorigin="anonymous"></script>

        <!-- Meta-data for social networks -->
        <meta property="og:title" content="" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="{{ asset('images/pictures/og-picture-sloow.jpeg') }}" />
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        <meta property="og:author" content="BENU VILLAGE Esch asbl" />

        <!-- Meta-data for Google -->
        <title>BENU SLOOW : Slow Food. Rescued Food. Null Abfall. Hohe Qualität. Soziale Inklusion.</title>
        <meta charset="utf-8" name="description" content="Weil Ernährung und Lebensmittelverschwendung Themen sind, die uns am Herzen liegen, gründen wir momentan BENU SLOOW. DAS erste 'rescued food'-Restaurant in der Großregion, das eine biologische, originelle, aber vor allem nachhaltige Küche anbietet!">

        <!-- Favicon -->
        <link rel="mask-icon" href="{{ asset('static/favicon/safari-pinned-tab.svg') }}" color="#f9941d">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="landing-body">
        <header class="landing-header">
            @include('header.harmonica_menu')
            <div class="header-bckgnd">
                <div class="header-bckgnd__font">
                    <div class="header-bckgnd__moving header-bckgnd__moving--1">
                        <img src="{{ asset('landing/pictures/benu_landing_clouds_illustration.svg') }}" style="height: 100%;" />
                    </div>
                    <div class="header-bckgnd__moving header-bckgnd__moving--2">
                        <img src="{{ asset('landing/pictures/benu_landing_clouds_illustration.svg') }}" style="height: 100%;" />
                    </div>
                </div>
                <div class="header-bckgnd__bird" id="header-bird-pic">
                    <img src="{{ asset('landing/pictures/benu_landing_illustration.svg') }}" class="header-bckgnd__bird__img" />
                </div>
            </div>
            
            <div class="header_logo">
                @svg('logo_benu_sloow_blanc', 'header_logo__img')
            </div>
            <div class="header_socialmedia">
                <p>
                    <!-- <a href="https://www.facebook.com/benuvillageesch/" target="_blank"><i class="fab fa-facebook-f"></i></a> -->
                    <a href="{{ route('landing-fr') }}" class="hover:underline @if(Route::currentRouteName() == 'landing') underline @endif">FR</a>
                </p>
                <p>
                    <!-- <a href="https://www.instagram.com/benu_village/" target="_blank"><i class="fab fa-instagram"></i></a> -->
                    <a href="{{ route('landing-lu') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-lu') underline @endif">LU</a>
                </p>
                <p>
                    <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                    <a href="{{ route('landing-de') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-de') underline @endif">DE</a>
                </p>
                <p>
                    <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                    <a href="{{ route('landing-en') }}" class="hover:underline @if(Route::currentRouteName() == 'landing-en') underline @endif">EN</a>
                </p>
            </div>
        </header>

        <main>
            <section class="pattern_bg">
                <div class="central_col">
                    <div class="central_textbox">
                        <div class="central_textbox__teaser">
                            <p>
                                BALD....
                            </p>
                        </div>
                        <h1>BENU SLO0W</h1>
                        <p class="central_textbox__sub">
                            Start der Website: 2. Quartal 2022
                        </p>
                        <p class="central_textbox__desc">
                            <strong>BENU SLO0W</strong>: Slow Food. Rescued Food. Zero Waste. Hohe Qualität. Soziale Inklusion. Ja, all das ist in einem einzigen Restaurant möglich! 
                        </p>
                        <p class="central_textbox__desc">
                            Dieses erste "Rescued Food"-Restaurant in der Großregion hat sich zum Ziel gesetzt, 80% der eingesetzten Lebensmittel als "Rescued" zu verwenden, d.h. Bio-Lebensmittel, die vom Handel abgelehnt werden, obwohl sie die EU-Normen erfüllen und von unbestreitbarer Qualität sind. In den meisten Fällen ist die Ablehnung auf eine schwankende Nachfrage zurückzuführen oder auf das ästhetische Aussehen der Ware: zu krumm, zu klein, zu...
                        </p>
                        <p class="central_textbox__desc">
                            Mit seinem Angebot an nachhaltiger, vegetarischer und veganer Küche folgt das Restaurant BENU den Prinzipien der Kreislaufwirtschaft und des UpCyclings und hat als Hauptziel die Sensibilisierung der breiten Öffentlichkeit für das Thema Lebensmittelverschwendung, weltweit, aber auch im Großherzogtum.
                        </p>
                        <p class="central_textbox__desc">
                            <strong>BENU SLO0W</strong> ist ein Ort der Entdeckung und des Lernens für alle, die sich für eine innovative Küche und in Vergessenheit geratene Zubereitungs- und Konservierungsmethoden interessieren. Mit seinem Gesamtkonzept legt das Restaurant den Grundstein für eine neue, nachhaltige und informative Form der Gastronomie in Luxemburg und möchte vor allem zeigen, dass auch eine krumme Karotte exquisit und mit überraschendem Geschmack präsentiert werden kann!
                        </p>
                        <ul class="central_textbox__desc">
                            <li class="mb-3"><strong>BENU SLO0W</strong></li>
                            <li class="text-left flex">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> bietet eine originelle und innovative Bio-Küche an,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> ist ein Ort der Entdeckung und Inspiration,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> versucht, die Verschwendung von Lebensmitteln nachhaltig zu bekämpfen,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> weckt, bezieht Stellung und diskutiert Themen rund um Lebensmittelproduktion und -verschwendung.
                                </p>
                            </li>
                        </ul>
                        <p class="central_textbox__desc mb-1">
                            Eine erste Webseite <strong>BENU SLO0W</strong> wird voraussichtlich Ende Juni 2022 online gehen. Hier erfährst du mehr Details zum Start des Restaurants BENU SLOOW! Bis dahin laden wir Dich ein, unsere Hauptseite <a href="https://benu.lu/fr" class="primary-color hover:text-gray-800 transition">www.benu.lu</a> zu besuchen.
                        </p>
                    </div>
                    <div class="contact-form-container">
                        <div>
                            <h2 class="text-center mb-6">
                                Bleib mit uns in Verbindung
                            </h2>
                            <!-- <div>
                                <form method="POST" class="contact_form">
                                    <input type="email" name="newsletter_email" placeholder="Je m'inscris à la newsletter">
                                    <input type="submit" name="newsletter_btn" value="Je m'inscris">
                                </form>
                            </div> -->
                            <div class="contact-link text-center">
                                <a href="https://benu.lu/fr/contactez-nous/" class="btn-couture-plain btn-couture-plain--dark-hover" target="_blank">Ich abonniere den Newsletter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="universe">
                <div class="text-center">
                    <h2>
                        Die BENU-Welt
                    </h2>
                    <div class="universe__links">
                        <div>
                            <a href="https://www.benureuse.lu/" class="btn-large btn-yellow" target="_blank">BENU REUSE</a>
                        </div>
                        <div>
                            <a href="https://benu.lu/de/" class="btn-large btn-green" target="_blank">BENU VILLAGE</a>
                        </div>
                    </div>
                </div>
            </section> -->

            <footer class="landing-footer">
                <div class="landing-footer__links">
                    <div class="landing-footer__links__header-container">
                        <div class="landing-footer__links__header">
                            Folge uns auf
                        </div>
                    </div>
                    <div class="landing-footer__links__icons">
                        <a href="https://www.facebook.com/benuvillageesch/" target="_blank" class="landing-footer__links__icon">
                            <!-- <a href="https://www.facebook.com/benuvillageesch/" target="_blank"><i class="fab fa-facebook-f"></i></a> -->
                            <p>
                                <i class="fab fa-facebook-f"></i>
                            </p>
                        </a>
                        <a href="https://www.instagram.com/benu_village/" target="_blank" class="landing-footer__links__icon">
                            <!-- <a href="https://www.instagram.com/benu_village/" target="_blank"><i class="fab fa-instagram"></i></a> -->
                            <p>
                                <i class="fab fa-instagram"></i>
                            </p>
                        </a>
                        <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank" class="landing-footer__links__icon">
                            <p>
                                <i class="fab fa-linkedin-in"></i>
                            </p>
                            <!-- <a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
                        </a>
                    </div>
                </div>
                <div class="text-center landing-footer__copyright">
                    &#169; 2022 - Design: Kamoo Studio <br/> & Entwicklung: BENU Village Esch asbl
                </div>
            </footer>
        </main>

        <!-- No layout to reduce weight, cannot use js from app  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function() {
                let width = window.innerWidth;
                if (width >= 1024) {
                    let newTop = '130px';
                    $('#header-bird-pic').css('top', newTop);
                    setInterval(function() {
                        if(window.innerWidth >= 1024) {
                            newTop = 60 + 150*Math.random();
                            newTop += 'px';
                            $('#header-bird-pic').css('top', newTop);
                        } else {
                            newTop = '80px';
                            $('#header-bird-pic').css('top', newTop);
                        }
                    }, 2500);
                }
            });
        </script>
    </body>
</html>