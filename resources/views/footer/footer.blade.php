<footer class="footer">
	<div class="benu-container">
		<div class="flex justify-start flex-wrap footer__lists">
			<div class="footer__lists__col flex flex-col lg:flex-row justify-start">
				<h4>BENU SLOOW</h4>
				<div>
					<ul class="footer__lists__col__list flex justify-start">
						<li><a href="#">{!! __('welcome.footer-menu-1') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">{!! __('welcome.footer-menu-2') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">{!! __('welcome.footer-menu-3') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">{!! __('welcome.footer-menu-4') !!}</a></li>
					</ul>
					<ul class="footer__lists__col__list flex justify-start flex-wrap">
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#data-protection">{!! __('welcome.footer-data-protection') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#legal-mentions">{!! __('welcome.footer-legal-mentions') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#kulturpass">{!! __('welcome.footer-kulturpass') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#general-conditions">{!! __('welcome.footer-general-conditions') !!}</a></li>
						
					</ul>
				</div>
			</div>
			<div class="footer__lists__col flex flex-col lg:flex-row justify-start lg:justify-center">
				<h4>{{ __('welcome.footer-title-social') }}</h4>
				<div class="flex justify-start">
					<a href="#" class="footer__social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="footer__social"><i class="fab fa-linkedin-in"></i></a>
					<a href="#" class="footer__social"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
		<div class="footer__copyright">
			&copy; 2022&nbsp;- Kamoo Studio&nbsp;- BENU Village Esch Asbl
		</div>
	</div>
	<div class="footer__logo-container">
		@svg('logo_benu_sloow', 'footer__logo-container__logo')
	</div>
</footer>