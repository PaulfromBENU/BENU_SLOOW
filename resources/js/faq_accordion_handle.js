function activateAccordeon()
{
	let resetChevron = 0;

	$('.welcome-faq__accordion__header').on('click', function() {
		if ($('.welcome-faq__accordion__header__chevron', this).hasClass('.welcome-faq__accordion__header__chevron--active')) {
			resetChevron = 1;
			console.log('yes');
		} else {
			resetChevron = 0;
			console.log('nope');
		}
		$('.welcome-faq__accordion__header__chevron').removeClass('.welcome-faq__accordion__header__chevron--active');
		$('.welcome-faq__accordion__header__chevron').css('transform', 'rotate(0deg)');
		if (!resetChevron) {
			$('.welcome-faq__accordion__header__chevron', this).addClass('.welcome-faq__accordion__header__chevron--active');
			$('.welcome-faq__accordion__header__chevron', this).css('transform', 'rotate(180deg)');
		}
		let status = $(this).parent().children('.welcome-faq__accordion__answer').css('display');
		$('.welcome-faq__accordion__answer').hide();
		if (status == 'none') {
			$(this).parent().children('.welcome-faq__accordion__answer').fadeIn('slow');
		}
	});

	$('.welcome-faq__accordion__answer__header').on('click', function() {
		$('.welcome-faq__accordion__answer__header').removeClass('welcome-faq__accordion__answer__header--active');
		$(this).addClass('welcome-faq__accordion__answer__header--active');

		let answerStatus = $(this).parent().children('.welcome-faq__accordion__answer__subanswer').css('display');

		$('.welcome-faq__accordion__answer__subanswer').hide();
		if (answerStatus == 'none') {
			$('.welcome-faq__accordion__answer__header__minus').hide();
			$('.welcome-faq__accordion__answer__header__plus').show();
			$('.welcome-faq__accordion__answer__header__plus', this).hide();
			$('.welcome-faq__accordion__answer__header__minus', this).show();
			$(this).parent().children('.welcome-faq__accordion__answer__subanswer').show();
		} else {
			$(this).removeClass('welcome-faq__accordion__answer__header--active');
			$('.welcome-faq__accordion__answer__header__plus').show();
			$('.welcome-faq__accordion__answer__header__minus').hide();
		}
	});
}

$(function() {
	activateAccordeon();

	Livewire.on('communicationsLoaded', function() {
		activateAccordeon();
	})
});