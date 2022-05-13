@extends('layouts.base_layout')

@section('title')
    {{ __('infos.seo-title') }}
@endsection

@section('description')
    {{ __('infos.seo-description') }}
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs pattern-bg">
        <div class="benu-container breadcrumbs__content flex justify-start">
            <a href="{{ route('home') }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('extra-infos-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.extra-infos') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    <section class="benu-container pt-10">
        <h2 class="login__subtitle">{{ __('infos.subtitle-1') }}</h2>
        <h1 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-1') }}<br/>Protection des données</h1>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-1') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-1-1') }}<br/>Les données personnelles telles que nom, prénom, adresse postale, numéro de téléphone, adresse électronique sont traitées de manière confidentielle. Elles sont utilisées uniquement dans le cadre de la reservation en ligne par BENU. Les données sont utilisées jusqu’à la fin de la transaction et sont sauvegardées pour le délai légal tel que défini par la loi sur la protection des données.
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-2') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-1-2') }}<br/> <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="primary-color">{{ route('home', ['locale' => app()->getLocale()]) }}</a> reconnaît et s'engage à respecter les lois et règlements régissant la protection des données personnelles, y compris, mais sans s’y limiter, le règlement (UE) 2016/679 du Parlement et du Conseil du 27 avril 2016 sur la protection des personnes en ce qui concerne le traitement des données personnelles et sur la libre circulation de ces données (le « RGPD ») et toute autre loi ou réglementation nationale applicable régissant le traitement de ces données personnelles.
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-3') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-1-3') }}<br/> Nous collectons et traitons notamment ton nom, prénom, adresse, adresse email, numéro de téléphone, adresse IP, données de connexions historiques de reservations données d’analyses fonctionnelles et comportementales exclusivement dans le cadre de et pour une durée strictement nécessaire pour la reservation. benusloow.lu ne stocke qu'un jeton d'authenticité comme référence permettant d’indiquer au service de paiement si un paiement a réussi ou échoué. Le caractère obligatoire ou facultatif de la collecte des données t’ est signalé lors de la collecte par un astérisque.

            </p>
        </div>
    </section>

    <section class="benu-container pt-10">
        <!-- <h2 class="login__subtitle">{{ __('infos.subtitle-2') }}</h2> -->
        <h2 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-2') }}<br/>Mentions légales</h2>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-1') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-2-1') }}<br/>Bienvenue sur le site www.benusloow.lu exploité par BENU VILLAGE ESCH asbl. Siège de BENU VILLAGE ESCH asbl :
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-2') }}</strong>
            </h3> -->
           <!--  <p>
                {{ __('infos.content-txt-2-2') }}<br/>50, rue des Celtes • L-1318 Luxembourg • Tel. +352 2791 1949 • <a href="mailto:info@benusloow.lu" class="primary-color">info@benusloow.lu</a>
            </p> -->
            <ul>
                <li>• {{ __('infos.content-bullet-1-1') }} 50, rue des Celtes</li>
                <li>• {{ __('infos.content-bullet-1-2') }} L-1318 Luxembourg</li>
                <li>• {{ __('infos.content-bullet-1-3') }} Tel. +352 2791 1949</li>
                <li>• <a href="mailto:info@benusloow.lu" class="primary-color">info@benusloow.lu</a></li>
            </ul>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-3') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-2-3') }}<br/>Immatriculée au Registre de Commerce et des Sociétés de Luxembourg sous le numéro F11364.
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-3') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-2-4') }}<br/>L'éditeur du site Internet s'engage à respecter toutes les dispositions légales relatives à la création et à l'exploitation d'un site Internet. BENU VILLAGE Esch asbl. est responsable du contenu du site web, mais pas de la véracité des annonces.
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <!-- <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-3') }}</strong>
            </h3> -->
            <p>
                {{ __('infos.content-txt-2-5') }}<br/>Les utilisateurs du site Web sont priés de lire attentivement les conditions générales et la déclaration de protection des données présentes sur cette page.
            </p>
        </div>
    </section>


    <section class="benu-container pt-10 pb-10">
        <!-- <h2 class="login__subtitle">{{ __('infos.subtitle-3') }}</h2> -->
        <h2 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-3') }}<br/>Kulturpass</h2>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-1') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-1') }}
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-2') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-2') }}
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-3') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-3') }}
            </p>
        </div>
    </section>

    <section class="benu-container pt-10 pb-10">
        <!-- <h2 class="login__subtitle">{{ __('infos.subtitle-4') }}</h2> -->
        <h2 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-4') }}<br/>Conditions générales</h2>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-4-1') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-4-1') }}
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-4-2') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-4-2') }}
            </p>
        </div>

        <div class="w-full lg:w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-4-3') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-4-3') }}
            </p>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
