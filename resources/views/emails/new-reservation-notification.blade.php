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
		<img src="{{ $message->embed(public_path('/images/pictures/logo_benu_green.png')) }}" style="height: 180px; margin: auto;" />
	</div>
	<div>
		<p>
			<strong>Moien,</strong>
		</p>
		@if($reservation->opening->type == '1')
		<p>
			Une nouvelle demande de réservation a été faite sur BENU SLOOW. Il est nécessaire de la valider dans le back-office.
		</p>
		@else
		<p>
			Une nouvelle réservation a été effectuée sur BENU SLO0W. Elle a été automatiquement validée.
		</p>
		@endif
		<p>
			Détails de la réservation :
		</p>
		<ul>
			<li>Nom : {{ ucfirst($reservation->first_name) }} {{ ucfirst($reservation->last_name) }}</li>
			<li>Date : {{ Carbon\Carbon::parse($reservation->opening->date)->format('d\/m\/Y') }}</li>
			<li>Heure : {{ $reservation->opening->starting_hour }}</li>
			<li>Nombre de convives : {{ $reservation->seats }}</li>
			<li>Demande spéciale : {{ $reservation->other_info }}</li>
			<li>Langue : {{ strtoupper($locale) }}</li>
		</ul>

		<p>
			<em><strong>BENU SLO0W</strong></em>
		</p>
	</div>
</body>
</html>