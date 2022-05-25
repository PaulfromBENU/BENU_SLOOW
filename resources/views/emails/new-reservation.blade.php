<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet"> 

	<title>Demande de réservation - BENU SLOOW</title>
</head>
<body style="width: 80%; margin-left: 10%; font-family: 'Barlow';">
	<div style="width: 100%; margin-bottom: 50px; text-align: center;">
		<img src="{{ $message->embed(asset('images/pictures/logo_benu_green.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>{{ __('emails.new-request-hello') }} {{ $reservation->first_name }} !</strong>
		</p>
		<p>
			{{ __('emails.new-request-txt-1') }}
		</p>
		<p>
			{{ __('emails.new-request-txt-2') }} <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">sloow.benu.lu</a>.
		</p>
		<!-- <p>
			{{ __('emails.new-request-details') }}&nbsp;:
		</p>
		<ul>
			<li>{{ __('emails.new-request-date') }} : {{ Carbon\Carbon::parse($reservation->opening->date)->format('d\/m\/Y') }}</li>
			<li>{{ __('emails.new-request-time') }} : {{ $reservation->opening->starting_hour }}</li>
			<li>{{ __('emails.new-request-number-of-seats') }} : {{ $reservation->seats }}</li>
			<li>{{ __('emails.new-request-address') }} : {{ __('emails.new-request-restaurant-address') }}</li>
		</ul> -->
<!-- 		<p>
			Le service commencera à l'heure indiquée, merci d'être le plus à l'heure possible pour ne rien rater de l'expérience !
		</p> -->
		<!-- <p>
			En cas d'annulation, merci de prévenir au plus vite afin que nous puissions réorganiser le service.
		</p>

		<p>
			Pour toute question, n'hésite pas à nous contacter par téléphone au +352 27 91 19 49.
		</p>
		<p>
			À très bientôt pour partager ce repas ensemble !
		</p> -->
		<p>
			<em><strong>{{ __('emails.new-request-regards') }} BENU SLO0W</strong></em>
		</p>
	</div>
</body>
</html>