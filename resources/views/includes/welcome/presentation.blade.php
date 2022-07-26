<section class="benu-container welcome-presentation flex justify-between flex-col-reverse lg:flex-row">
    <div class="welcome-presentation__desc">
        <div>
            <h3 class="welcome-presentation__desc__title welcome-illustration-1">
                <span class="primary-color">BENU SLOOW</span> {!! __('welcome.pres-title-1-1') !!}
            </h3>
        </div>

        <div>
            <p class="font-bold secondary-color mb-4 text-lg lg:text-xl" style="text-shadow: white 0 0 1px;">
                {!! __('welcome.subtitle-1') !!}
            </p>
            <p class="welcome-presentation__desc__text">
                {!! __('welcome.pres-txt-1') !!}
            <br/>
                {!! __('welcome.pres-txt-2') !!}
            </p>
        </div>
        <div class="">
            <button onclick="document.getElementById('host-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="btn-slider-left btn-slider-left--secondary font-bold text-lg">{!! __('welcome.pres-link-1') !!}</button>
        </div>
    </div>
    <div class="welcome-presentation__illustration">
        <img src="{{ asset('images/pictures/sloow_main_picture_v5.jpg') }}" class="welcome-illustration-1 welcome-presentation__img">
    </div>
</section>