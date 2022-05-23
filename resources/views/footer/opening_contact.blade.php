<section class="footer-contact">
	<h4 class="footer-contact__title">{{ __('footer.opening-hours-title-1') }}</h4>
	<p class="footer-contact__txt">
		{{ __('footer.opening-hours-text-1') }}
	</p>
	<p class="footer-contact__txt mb-10">
		<em>{{ __('footer.opening-hours-text-2') }}</em>
	</p>

	<h4 class="footer-contact__title" id="contact-anchor">{{ __('footer.contact-title-1') }}</h4>
	<p class="footer-contact__txt">
		BENU VILLAGE Esch ASBL
	</p>
	<p class="footer-contact__txt mb-10">
		51 rue d'Audun, L-4018 Esch-sur-Alzette, Luxembourg
	</p>

	<p class="footer-contact__phone">
		+352 27 91 19 49
	</p>

	<p>
		{{ __('footer.contact-opening-1') }}
	</p>

	<p>
		{{ __('footer.contact-opening-2') }}
	</p>

	<div class="footer-contact__form m-auto" id="contact-form">
		@livewire('services.contact-form')
	</div>

	<div class="footer-contact__map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1295.8559847192905!2d5.976524899174659!3d49.48994757923427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479535baf51b3e97%3A0x1e6f1b1ab2afaad4!2sBENU%20SLOOW!5e0!3m2!1sen!2slu!4v1653291022450!5m2!1sen!2slu" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<p class="text-center w-3/4 m-auto pt-5 pb-5">
		{{ __('welcome.map-explanation') }}
	</p>
</section>