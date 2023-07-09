<footer class="footer">
	<div class="benu-container">
		<div class="flex justify-start flex-wrap footer__lists">
			<div class="footer__lists__col flex flex-col lg:flex-row justify-start">
				<h4>BENU SLOOW</h4>
				<div>
					<ul class="footer__lists__col__list flex justify-start">
						<li><a onclick="document.getElementById('host-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" style="cursor: pointer;">{!! __('welcome.footer-menu-1') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a onclick="document.getElementById('reservation-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" style="cursor: pointer;">{!! __('welcome.footer-menu-2') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="https://linktr.ee/benuvillage?fbclid=PAAaZgO9AHCk-2tMi7aV6dQo-3JMH7k1uKIoCGn2WulIcezR7KA-64ETKuWG4" target="_blank" style="cursor: pointer;">MENU</a></li>
<!--{{ __('header.title-5') }}-->
						<li style="color: lightgrey;">|</li>
						<li><a onclick="document.getElementById('faq-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" style="cursor: pointer;">{!! __('welcome.footer-menu-3') !!}</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a onclick="document.getElementById('contact-anchor').scrollIntoView({ behavior: 'smooth', block: 'center' });" style="cursor: pointer;">{!! __('welcome.footer-menu-4') !!}</a></li>
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
					<a href="https://www.facebook.com/benuvillageesch" class="footer__social"><i class="fab fa-facebook-f"></i></a>
					<a href="https://lu.linkedin.com/company/benu-village-esch" class="footer__social"><i class="fab fa-linkedin-in"></i></a>
					<a href="https://www.instagram.com/benu_village/?hl=fr" class="footer__social"><i class="fab fa-instagram"></i></a>
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