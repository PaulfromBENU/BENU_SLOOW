<section class="w-1/2 m-auto text-center contact service-panel" id="services-contact">
	<div class="contact__subtitle">
		{!! __('services.contact-subtitle') !!}
	</div>
	<div class="contact__title">
		<h1>
			{!! __('services.contact-title') !!}
		</h1>
	</div>
	<div class="contact__mail">
		<a href="mailto:info@benucouture.lu" class="btn-slider-left m-auto">info@benucouture.lu</a>
	</div>
	<div class="contact__phone">
		+352 123 456 789
	</div>
	<div class="contact__opening">
		{!! __('services.contact-opening') !!}
	</div>
	<div class="contact__moreinfo">
		{!! __('services.contact-extra-txt') !!}
	</div>
	<div class="contact__form">
		<p class="contact__form__subtitle">
			{!! __('services.contact-form-subtitle') !!}
		</p>
		<h3 class="contact__form__title">{!! __('services.contact-form-title') !!}</h3>
		@livewire('services.contact-form')
	</div>
</section>