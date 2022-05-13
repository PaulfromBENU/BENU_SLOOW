<section class="benu-container welcome-presentation">
    <div class="welcome-presentation__illustration">
        <img src="{{ asset('images/pictures/sloow_presentation_picture.jpeg') }}" class="welcome-illustration-1 welcome-presentation__img">
    </div>
    <div class="welcome-presentation__desc">
        <div>
            <h3 class="welcome-presentation__desc__title welcome-illustration-1">
                <span class="primary-color">BENU SLOOW</span> {!! __('welcome.pres-title-1-1') !!}
            </h3>
        </div>

        <div>
            <p class="font-bold secondary-color mb-5 text-lg lg:text-xl">
                {!! __('welcome.subtitle-1') !!}
            </p>
            <p class="welcome-illustration-1 welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-1') !!}
            </p>
        </div>
        <div class="">
            <button onclick="document.getElementById('host-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="btn-slider-left btn-slider-left--secondary font-bold text-lg">{!! __('welcome.pres-link-1') !!}</button>
        </div>
    </div>
</section>