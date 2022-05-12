<section class="welcome-faq relative" id="services-faq">
	<div class="w-1/2 m-auto pb-10">
		<h2 class="welcome-faq__title primary-color">{!! __('services.faq-title') !!}</h2>
		<ul class="welcome-faq__accordion">
			@for($index = 1; $index <= $faq_titles_count; $index ++)
				<li>
					<div class="welcome-faq__accordion__header flex justify-between">
						<p>{!! __('services.faq-group-title-'.$index) !!}</p>
						<p><img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="welcome-faq__accordion__header__chevron"></p>
					</div>

					<div class="welcome-faq__accordion__answer" style="display: none;">
						<p class="welcome-faq__accordion__answer__txt">
							{!! __('services.faq-group-desc-'.$index) !!}
						</p>
						<ul class="mb-10">
							@for($sub_index = 1; $sub_index <= $faq_subtitles_count[$index]; $sub_index ++)
								<li>
									<div class="flex justify-between welcome-faq__accordion__answer__header">
										<p>{!! __('services.faq-group-'.$index.'-question-title-'.$sub_index) !!}</p>
										<p>
											<span class="welcome-faq__accordion__answer__header__plus">+</span>
											<span class="welcome-faq__accordion__answer__header__minus" style="display: none;">-</span>
										</p>
									</div>
									<p class="welcome-faq__accordion__answer__subanswer" style="display: none;">
										{!! __('services.faq-group-'.$index.'-question-content-'.$sub_index) !!}
									</p>
								</li>
							@endfor
						</ul>
					</div>
				</li>
			@endfor
		</ul>
	</div>

	<div class="welcome-faq__sponsor absolute">
		<div class="benu-container flex justify-between" style="height: 100%;">
			<div class="flex justify-start">
				<div class="mr-10 welcome-faq__sponsor__logo">
					<img src="{{ asset('images/pictures/logo-oeuvre-gdc.jpg') }}">
				</div>
				<p>
					{{ __('welcome.sponsor-thanks-1') }}
				</p>
			</div>
			<div class="pt-7">
				<a href="#" class="btn-couture">{{ __('welcome.sponsor-link-1') }}</a>
			</div>
		</div>
	</div>
</section>