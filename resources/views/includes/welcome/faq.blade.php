<section class="welcome-faq relative" id="services-faq">
	<div class="welcome-faq__container pb-10">
		<h2 class="welcome-faq__title primary-color" id="faq-anchor">{!! __('services.faq-title') !!}</h2>
		<ul class="welcome-faq__accordion">
			<li>
				<div class="welcome-faq__accordion__header flex justify-between">
					<p class="w-4/5">{!! __('services.faq-group-title-1') !!}</p>
					<div class="w-1/6 flex flex-col justify-center">
						<p class="flex justify-end">
							<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron">
						</p>
					</div>
				</div>

				<div class="welcome-faq__accordion__answer" style="display: none;">
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-1-1') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-1-2') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-1-3') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-1-4') !!}
					</p>
				</div>
			</li>

			<li>
				<div class="welcome-faq__accordion__header flex justify-between">
					<p class="w-4/5">{!! __('services.faq-group-title-2') !!}</p>
					<div class="w-1/6 flex flex-col justify-center">
						<p class="flex justify-end">
							<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron">
						</p>
					</div>
				</div>

				<div class="welcome-faq__accordion__answer" style="display: none;">
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-2-1') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-2-2') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-2-3') !!}
					</p>
				</div>
			</li>

			<li>
				<div class="welcome-faq__accordion__header flex justify-between">
					<p class="w-4/5">{!! __('services.faq-group-title-3') !!}</p>
					<div class="w-1/6 flex flex-col justify-center">
						<p class="flex justify-end">
							<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron">
						</p>
					</div>
				</div>

				<div class="welcome-faq__accordion__answer" style="display: none;">
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-3-1') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-3-2') !!}
					</p>
				</div>
			</li>

			<li>
				<div class="welcome-faq__accordion__header flex justify-between">
					<p class="w-4/5">{!! __('services.faq-group-title-4') !!}</p>
					<div class="w-1/6 flex flex-col justify-center">
						<p class="flex justify-end">
							<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron">
						</p>
					</div>
				</div>

				<div class="welcome-faq__accordion__answer" style="display: none;">
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-4-1') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-4-2') !!}
					</p>
				</div>
			</li>

			<li>
				<div class="welcome-faq__accordion__header flex justify-between">
					<p class="w-4/5">{!! __('services.faq-group-title-5') !!}</p>
					<div class="w-1/6 flex flex-col justify-center">
						<p class="flex justify-end">
							<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron">
						</p>
					</div>
				</div>

				<div class="welcome-faq__accordion__answer" style="display: none;">
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-5-1') !!} <a href="mailto:info@benusloow.lu" class="primary-color hover:text-gray-800 transition">info@benusloow.lu</a>.
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-5-2') !!}
					</p>
					<p class="welcome-faq__accordion__answer__txt">
						{!! __('services.faq-group-desc-5-3') !!}
					</p>
				</div>
			</li>
		</ul>
	</div>

	<div class="welcome-faq__sponsor absolute">
		<div class="benu-container flex justify-between flex-col lg:flex-row" style="height: 100%;">
			<div class="flex flex-col lg:flex-row justify-start" style="height: 100%;">
				<div class="lg:mr-10 welcome-faq__sponsor__logo">
					<img src="{{ asset('images/pictures/logo-oeuvre-gdc.jpg') }}">
				</div>
				<div class="text-center lg:text-left flex flex-col justify-center">
					<p>{{ __('welcome.sponsor-thanks-1') }}</p>
				</div>
			</div>
			<div class="text-center lg:text-left flex flex-col justify-center" style="min-width: 200px;">
				<a href="https://www.oeuvre.lu/" target="_blank" class="btn-couture">{{ __('welcome.sponsor-link-1') }}</a>
			</div>
		</div>
	</div>
</section>