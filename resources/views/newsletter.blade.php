@extends('layouts.base_layout')

@section('title')
    {{ __('auth.newsletter-subscribe-seo-title') }}
@endsection

@section('description')
    {{ __('auth.newsletter-subscribe-seo-desc') }}
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs pattern-bg">
        <div class="benu-container breadcrumbs__content flex justify-start">
            <a href="{{ route('home') }}">{{ __('breadcrumbs.home') }}</a>
            <div class="pl-5 pr-5">
                >
            </div>
            <a href="{{ route('newsletter-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.newsletter-subscribe') }}</strong></a>
        </div>
    </div>
@endsection

@section('main-content')
    <section class="benu-container login">
        <h3 class="login__subtitle">{{ __('auth.newsletter-subscribe-newsletter') }}</h3>
        @if(session('success') !== null)
            <div class="p-5 m-auto text-center mb-5 font-bold w-2/3 success-message" style="border-radius: 8px;">
                {!! __('auth.newsletter-subscribe-success') !!}
            </div>
        @else
            @auth
                @if(auth()->user()->newsletter == '1')
                <h1 class="login__title">{{ __('auth.newsletter-unsubscribe-title-1') }} <br/>{{ __('auth.newsletter-unsubscribe-title-2') }}</h1>
                @else
                <h1 class="login__title">{{ __('auth.newsletter-subscribe-title-1') }} <br/>{{ __('auth.newsletter-subscribe-title-2') }}</h1>
                @endif
            @else
            <h1 class="login__title">{{ __('auth.newsletter-subscribe-title-1') }} <br/>{{ __('auth.newsletter-subscribe-title-2') }}</h1>
            @endauth

            <form method="POST" action="{{ route('newsletter-subscribe', ['locale' => app()->getLocale()]) }}" class="w-full lg:w-1/4 m-auto mb-10">
                @csrf

                <div class="input-group reactive-label-input" @auth style="display: none;" @endauth>
                    <label for="newsletter_first_name">{{ __('auth.newsletter-subscribe-first-name') }} *</label>
                    <input type="text" id="newsletter_first_name" name="newsletter_first_name" class="input-underline w-full" required @auth value="{{ auth()->user()->first_name }}" @endauth>
                </div>
                <div class="input-group reactive-label-input" @auth style="display: none;" @endauth>
                    <label for="newsletter_last_name">{{ __('auth.newsletter-subscribe-last-name') }} *</label>
                    <input type="text" id="newsletter_last_name" name="newsletter_last_name" class="input-underline w-full" required @auth value="{{ auth()->user()->last_name }}" @endauth>
                </div>

                <div class="input-group reactive-label-input">
                    <label for="newsletter_email">{{ __('auth.newsletter-subscribe-email') }} *</label>
                    <input type="text" id="newsletter_email" name="newsletter_email" class="input-underline w-full" required @auth value="{{ auth()->user()->email }}" @endauth>
                </div>

                <p class="login__info">
                    <em>* {{ __('auth.newsletter-subscribe-mandatory') }}</em>
                </p>
                
                <div class="m-auto login__validate">
                    @auth
                        @if(auth()->user()->newsletter == '1')
                        <input type="submit" name="newsletter_submit" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" value="{{ __('auth.newsletter-subscribe-unsubscribe') }}">
                        @else
                        <input type="submit" name="newsletter_submit" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" value="{{ __('auth.newsletter-subscribe-subscribe') }}">
                        @endif
                    @else
                    <input type="submit" name="newsletter_submit" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover" value="{{ __('auth.newsletter-subscribe-subscribe') }}">
                    @endauth

                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="btn-slider-left mt-3">{{ __('auth.newsletter-subscribe-back-to-home') }}</a>
                </div>

                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
            </form>
        @endif
    </section>
@endsection

@section('scripts')

@endsection