<footer class="footer">
	<div class="benu-container">
		<div class="flex justify-start flex-wrap footer__lists">
			<div class="footer__lists__col flex flex-col lg:flex-row justify-start">
				<h4>BENU SLOOW</h4>
				<div>
					<ul class="footer__lists__col__list flex justify-start">
						<li><a href="#">Menu 1</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">Menu 2</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">Menu 3</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="#">Menu 4</a></li>
					</ul>
					<ul class="footer__lists__col__list flex justify-start flex-wrap">
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#data-protection">Protection des données</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#legal-mentions">Mentions légales</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#kulturpass">Kulturpass</a></li>
						<li style="color: lightgrey;">|</li>
						<li><a href="{{ route('extra-infos-'.app()->getLocale()) }}#general-conditions">Conditions générales</a></li>
						
					</ul>
				</div>
			</div>
			<div class="footer__lists__col flex flex-col lg:flex-row justify-start lg:justify-center">
				<h4>{{ __('footer.footer-title-5') }}</h4>
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