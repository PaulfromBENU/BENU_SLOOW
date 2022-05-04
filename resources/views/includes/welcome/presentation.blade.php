<section class="benu-container welcome-presentation">
    <div class="welcome-presentation__illustration">
        <img src="{{ asset('images/pictures/benu-reuse-illustration1-echange.png') }}" class="welcome-illustration-1 welcome-presentation__img">
        <!-- <img src="{{ asset('images/pictures/benu-reuse-illustration2-environnement.png') }}" class="welcome-illustration-2 welcome-presentation__img">
        <img src="{{ asset('images/pictures/benu-reuse-illustration3-conseils.png') }}" class="welcome-illustration-3 welcome-presentation__img">
        <img src="{{ asset('images/pictures/benu-reuse-illustration4-services.png') }}" class="welcome-illustration-4 welcome-presentation__img">
        <img src="{{ asset('images/pictures/benu-reuse-illustration5-utiles.png') }}" class="welcome-illustration-5 welcome-presentation__img"> -->
    </div>
    <div class="welcome-presentation__desc">
        <!-- <div class="flex justify-start welcome-presentation__desc__bar">
            <button class="welcome-presentation__desc__bar__btn --active welcome-illustration-btn-1">{{ __('welcome.bar-title-1') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-2">{{ __('welcome.bar-title-2') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-3">{{ __('welcome.bar-title-3') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-4">{{ __('welcome.bar-title-4') }}</button>
            <button class="welcome-presentation__desc__bar__btn welcome-illustration-btn-5">{{ __('welcome.bar-title-5') }}</button>
        </div> -->
        <div>
            <h3 class="welcome-presentation__desc__title welcome-illustration-1">
                <span class="primary-color">BENU SLOOW</span> {{ __('welcome.pres-title-1-1') }}
            </h3>
            <!-- <h3 class="welcome-presentation__desc__title welcome-illustration-2">
                {{ __('welcome.pres-title-2-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-3">
                {{ __('welcome.pres-title-3-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-4">
                {{ __('welcome.pres-title-4-1') }}
            </h3>
            <h3 class="welcome-presentation__desc__title welcome-illustration-5">
                {{ __('welcome.pres-title-5-1') }}
            </h3> -->
        </div>

        <div class="">
            <p class="font-bold secondary-color mb-5 text-xl">
                {!! __('welcome.subtitle-1') !!}
            </p>
            <p class="welcome-illustration-1 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-1') !!}
            </p>
            <!-- <p class="welcome-illustration-2 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-2') !!}
            </p>
            <p class="welcome-illustration-3 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-3') !!}
            </p>
            <p class="welcome-illustration-4 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-4') !!}
            </p>
            <ul class="welcome-illustration-5 welcome-presentation__desc__text" id="welcome-bullet-presentation">
                <li>{!! __('welcome.pres-txt-5') !!}</li>
            </ul> -->
        </div>
        <div class="">
            <a href="#" class="btn-slider-left btn-slider-left--secondary font-bold text-lg">{!! __('welcome.pres-link-1') !!}</a>
            <!-- <a href="#" class="welcome-illustration-2 welcome-presentation__desc__link">{!! __('welcome.pres-link-2') !!}</a>
            <a href="#" class="welcome-illustration-3 welcome-presentation__desc__link">{!! __('welcome.pres-link-3') !!}</a>
            <a href="#" class="welcome-illustration-4 welcome-presentation__desc__link">{!! __('welcome.pres-link-4') !!}</a>
            <a href="#" class="welcome-illustration-5 welcome-presentation__desc__link">{!! __('welcome.pres-link-5') !!}</a> -->
        </div>
    </div>
</section>