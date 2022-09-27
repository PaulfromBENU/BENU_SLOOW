<!DOCTYPE html>
<html lang="en">
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
        <title>BENU SLOOW : Slow Food. Rescued Food. Zero Waste. High quality. Social inclusion.</title>
        <meta charset="utf-8" name="description" content="Because nutrition and food waste are subjects that are close to our hearts, we are creating BENU SLOOW. THE first 'rescued food' restaurant in the Greater Region that offers organic, original and above all sustainable cuisine! ">

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
                                Soon....
                            </p>
                        </div>
                        <h1>BENU SLO0W</h1>
                        <p class="central_textbox__sub">
                            Website launch: 2nd semester 2022
                        </p>
                        <p class="central_textbox__desc">
                            <strong>BENU SLO0W</strong>: Slow Food. Rescued Food. Zero Waste. High quality. Social inclusion. Yes, all this is possible in one restaurant! 
                        </p>
                        <p class="central_textbox__desc">
                            This first "Rescued Food" restaurant in the Greater Region has set itself the goal of using 80% of the food it processes as "rescued", i.e. organic food that is rejected by the market even though it meets EU standards and is of unquestionable quality. In most cases, the rejection is due to fluctuating demand or to the aesthetic appearance of the goods: too crooked, too small, too...
                        </p>
                        <p class="central_textbox__desc">
                            By offering sustainable, vegetarian and vegan cuisine, the BENU restaurant follows the principles of circular economy and UpCycling and has as its main objective to raise awareness among the general public on the issue of food waste worldwide, but also in the Grand Duchy.
                        </p>
                        <p class="central_textbox__desc">
                            <strong>BENU SLO0W</strong> is a place of discovery and learning for anyone interested in innovative cuisine and forgotten preparation and preservation methods. With its overall concept, the restaurant lays the foundation for a new, sustainable and informative form of gastronomy in Luxembourg and, above all, wants to show that even a crooked carrot can be presented exquisitely and with surprising taste!
                        </p>
                        <ul class="central_textbox__desc">
                            <li class="mb-3"><strong>BENU SLO0W</strong></li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> offers original and innovative organic cuisine,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> is a place of discovery and inspiration,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> seeks to combat food waste in a sustainable way,
                                </p>
                            </li>
                            <li class="text-left flex mb-1">
                                <p class="pr-2 pt-2 lg:pt-3">@svg('radish')</p>
                                <p> awakens, takes a stand and discusses issues around food production and waste.
                                </p>
                            </li>
                        </ul>
                        <p class="central_textbox__desc">
                            A first website <strong>BENU SLO0W</strong> is expected to go online at the end of June 2022. Find out more details about the launch of the BENU SLOOW restaurant here! Until then, we invite you to visit our main site <a href="https://benu.lu/fr" class="primary-color hover:text-gray-800 transition">www.benu.lu</a>.
                        </p>
                    </div>
                    <div class="contact-form-container">
                        <div>
                            <h2 class="text-center mb-6">
                                Keep in touch
                            </h2>
                            <!-- <div>
                                <form method="POST" class="contact_form">
                                    <input type="email" name="newsletter_email" placeholder="Je m'inscris à la newsletter">
                                    <input type="submit" name="newsletter_btn" value="Je m'inscris">
                                </form>
                            </div> -->
                            <div class="contact-link text-center">
                                <a href="https://benu.lu/en/contact-us/" class="btn-couture-plain btn-couture-plain--dark-hover" target="_blank">I subscribe to the newsletter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="universe">
                <div class="text-center">
                    <h2>
                        The BENU universe
                    </h2>
                    <div class="universe__links">
                        <div>
                            <a href="https://www.benureuse.lu/en/" class="btn-large btn-yellow" target="_blank">BENU REUSE</a>
                        </div>
                        <div>
                            <a href="https://benu.lu/en/" class="btn-large btn-green" target="_blank">BENU VILLAGE</a>
                        </div>
                    </div>
                </div>
            </section>
 -->
            <footer class="landing-footer">
                <div class="landing-footer__links">
                    <div class="landing-footer__links__header-container">
                        <div class="landing-footer__links__header">
                            Follow us on
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
                    &#169; 2022 - Design: Kamoo Studio <br/> & Development: BENU Village Esch asbl
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