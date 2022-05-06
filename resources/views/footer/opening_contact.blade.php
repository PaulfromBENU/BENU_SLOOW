<section class="footer-contact">
	<h4 class="footer-contact__title">Heures d'ouverture</h4>
	<p class="footer-contact__txt">
		{{ __('footer.opening-hours-text-1') }}
	</p>
	<p class="footer-contact__txt mb-10">
		<em>{{ __('footer.opening-hours-text-2') }}</em>
	</p>

	<h4 class="footer-contact__title" id="contact-anchor">Contact</h4>
	<p class="footer-contact__txt">
		BENU VILLAGE Esch ASBL
	</p>
	<p class="footer-contact__txt mb-10">
		51 rue d'Audun, L-4018 Esch-sur-Alzette, Luxembourg
	</p>

	<p class="footer-contact__phone">
		+352 27 91 19 49
	</p>

	<div class="footer-contact__form m-auto" id="contact-form">
		@livewire('services.contact-form')
	</div>
</section>