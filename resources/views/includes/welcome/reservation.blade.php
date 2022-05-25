<section class="welcome-reservation">
	<div class="welcome-reservation__block">
		<h2 class="welcome-reservation__block__title"  id="reservation-anchor-mobile">{!! __('welcome.reservation-title-1') !!}</h2>
		@livewire('reservations.welcome-reservations')
	</div>
	<div class="welcome-reservation__bg">
		<img src="{{ asset('images/pictures/benu-sloow-photo-transition-2-ld.png') }}">
		@svg('light-green-soil-top')
	</div>
	<div class="welcome-reservation__bottom-bg"></div>
</section>