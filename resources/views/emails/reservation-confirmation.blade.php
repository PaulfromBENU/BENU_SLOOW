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
<body style="width: 80%; margin-left: 10%; font-family: 'Barlow' !important;">
	<style type=“text/css”>
		@import url (https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap) ;
	</style>
	<!--[if mso]>
	<style type="text/css">
	body, table, td {font-family: Barlow !important;}
	</style>
	<![endif]-->
	<div style="width: 100%; margin-bottom: 50px; text-align: center;">
		<img src="{{ $message->embed(public_path('/images/pictures/logo_benu_sloow.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>{{ __('emails.new-reservation-hello') }} {{ $reservation->first_name }},</strong>
		</p>
		<p>
			@if($reservation->opening->type == '0')
			{{ __('emails.new-reservation-hosts-table-confirmation') }}&nbsp;!
			@else
			{{ __('emails.new-reservation-restaurant-confirmation') }}&nbsp;!
			@endif
		</p>
		<p>
			@if($reservation->opening->type == '0')
			{{ __('emails.new-reservation-hosts-details-1') }} {{ $reservation->seats }} {{ __('emails.new-reservation-host-people') }}&nbsp;:
			@else
			{{ __('emails.new-reservation-restaurant-details-1') }} {{ $reservation->seats }} {{ __('emails.new-reservation-restaurant-people') }}&nbsp;:
			@endif
		</p>
		<ul>
			<li>{{ __('emails.new-reservation-date') }} : {{ Carbon\Carbon::parse($reservation->opening->date)->format('d\/m\/Y') }}</li>
			<li>{{ __('emails.new-reservation-time') }} : {{ $reservation->opening->starting_hour }}</li>
			<li>{{ __('emails.new-reservation-address') }} : {{ __('emails.new-reservation-restaurant-address') }}</li>
		</ul>

		@if($reservation->opening->type == '0')
		<p>
			{{ __('emails.new-reservation-be-on-time') }}
		</p>
		@endif
		
		<p>
			@if($reservation->opening->type == '0')
			{{ __('emails.new-reservation-hosts-cancellation') }}
			@else
			{{ __('emails.new-reservation-restaurant-cancellation') }}
			@endif
		</p>

		<p>
			{{ __('emails.new-reservation-more-info-1') }} <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">sloow.benu.lu</a>. {{ __('emails.new-reservation-more-info-2') }}
		</p>
		<p>
			@if($reservation->opening->type == '0')
			{{ __('emails.new-reservation-hosts-welcome') }}
			@else
			{{ __('emails.new-reservation-restaurant-welcome') }}
			@endif
		</p>
		<p>
			<em><strong>{{ __('emails.new-reservation-regards') }} BENU SLO0W</strong></em>
		</p>
	</div>
</body>
</html>