<section class="welcome-concept relative">
	<div class="welcome-concept__fader"></div>
	<img src="{{ asset('images/pictures/transition_sloow_2_25_07.png') }}" class="welcome-concept__bg" id="welcome-concept__bg" />
	<h3>
		{!! __('welcome.concept-title-1') !!}
	</h3>
	<center>
		<div class="welcome-concept__starting" >
			{!! __('welcome.concept-hosts-table') !!}
			{!! __('welcome.concept-hosts-table-text1') !!}
		</div>
	</center>
	 <h5 class="text-lg lg:text-xl" >
		{!! __('welcome.concept-hosts-table-text2') !!}
	</h5>
	<div class="welcome-concept__box relative">
		<div class="welcome-concept__box__border welcome-concept__box__border--bottom">
			<img src="{{ asset('images/pictures/benu-sloow-partie-table-hotes-border-bottom.png') }}">
		</div>
		<div class="welcome-concept__box__border welcome-concept__box__border--left">
			<img src="{{ asset('images/pictures/benu-sloow-partie-table-hotes-border-left.png') }}">
		</div>
		<div class="welcome-concept__box__border welcome-concept__box__border--top">
			<img src="{{ asset('images/pictures/benu-sloow-partie-table-hotes-border-top.png') }}">
		</div>
		<div class="welcome-concept__box__border welcome-concept__box__border--right">
			<img src="{{ asset('images/pictures/benu-sloow-partie-table-hotes-border-right.png') }}">
		</div>
		<h4 id="host-anchor">
			{!! __('welcome.concept-subtitle-1') !!}
		</h4>
		<p class="welcome-concept__box__desc">
			{!! __('welcome.concept-explanation-1') !!}
		</p>
		<div class="welcome-concept__box__prices">
			<p>
				{!! __('welcome.concept-price-no-drinks') !!}: <strong>150€</strong>
			</p>
			<p>
				{!! __('welcome.concept-price-with-drinks') !!}: <strong>200€</strong>
			</p>
			<p>
				{!! __('welcome.concept-price-with-softs') !!}: <strong>180€</strong>
			</p>
		</div>
		<p class="welcome-concept__info">
			{!! __('welcome.concept-kulturpass-discount') !!}
			<br/>
			<a href="{{ route('extra-infos-'.app()->getLocale()) }}#kulturpass">{!! __('welcome.concept-kulturpass-learn-more') !!}</a>
		</p>
	</div>
	<h4 >
		{!! __('welcome.concept-start-date') !!}
	</h4>
	<center>
		<div class="welcome-concept__bottomstart">
			{!! __('welcome.concept-start-date-text1') !!}
		</div>
		<div class="welcome-concept__bottomtext">
			<span class="third-color">{!! __('welcome.concept-start-date-text2') !!}</span>
			<span class="secondary-color">{!! __('welcome.concept-start-date-text3') !!}</span>
			<span class="third-color">{!! __('welcome.concept-start-date-text4') !!}</span>
			<span class="secondary-color"><a href="mailto:{!! __('welcome.concept-start-date-text5') !!}">{!! __('welcome.concept-start-date-text5') !!}</a></span>
		</div>
	</center>
</section>