<section class="benu-container footer-more">
	<div class="benu-container footer-more__wrapper">
		<div class="footer-more__block">
			<h3>{!! __('footer.questions-title') !!}</h3>
			<p>
				{!! __('footer.questions-txt-1') !!}
			</p>
			<div class="text-center">
				<button onclick="document.getElementById('contact-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" class="btn-couture">{{ __('footer.questions-contact') }}</button>
			</div>
		</div>
		<div class="footer-more__illustration footer-more__illustration--left">
			<img src="{{ asset('images/pictures/footer-before-questions.png') }}">
		</div>
		<div class="footer-more__illustration footer-more__illustration--right">
			<img src="{{ asset('images/pictures/footer-after-questions.png') }}">
		</div>
	</div>
</section>