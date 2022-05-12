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
        <h1 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-1') }}</h1>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-1') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-1-1') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-2') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-1-2') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-1-3') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-1-3') }}
            </p>
        </div>
    </section>

    <section class="benu-container pt-10">
        <h2 class="login__subtitle">{{ __('infos.subtitle-2') }}</h2>
        <h1 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-2') }}</h1>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-1') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-2-1') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-2') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-2-2') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-2-3') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-2-3') }}
            </p>
        </div>
    </section>


    <section class="benu-container pt-10 pb-10">
        <h2 class="login__subtitle">{{ __('infos.subtitle-3') }}</h2>
        <h1 class="login__title mb-10" id="anchor-part-1">{{ __('infos.title-3') }}</h1>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-1') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-1') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-2') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-2') }}
            </p>
        </div>

        <div class="w-2/3 m-auto mb-5">
            <h3 class="primary-color">
                <strong>{{ __('infos.content-title-3-3') }}</strong>
            </h3>
            <p>
                {{ __('infos.content-txt-3-3') }}
            </p>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
