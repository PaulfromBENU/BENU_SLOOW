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
			<strong>Bonjour {{ $reservation->first_name }},</strong>
		</p>
		<p>
			Nous avons bien reçu votre demande de réservation dans notre restaurant BENU SLO0W&nbsp;! Nous vous confirmerons votre réservation dans les plus brefs délais, après vérification des places disponibles.
		</p>
		<p>
			Vous avez réservé pour {{ $reservation->seats }} personne(s), pour le repas suivant :
		</p>
		<ul>
			<li>Date : {{ Carbon\Carbon::parse($reservation->opening->date)->format('d\/m\/Y') }}</li>
			<li>Heure : {{ $reservation->opening->starting_hour }}</li>
			<li>Adresse : adresse du restaurant</li>
		</ul>
		<p>
			Le service commencera à l'heure indiquée, merci d'être le plus à l'heure possible pour ne rien rater de l'expérience !
		</p>
		<p>
			En cas d'annulation, merci de prévenir au plus vite afin que nous puissions réorganiser le service.
		</p>

		<p>
			Pour toute question, n'hésite pas à nous contacter par téléphone au +352 27 91 19 49.
		</p>
		<p>
			À très bientôt pour partager ce repas ensemble !
		</p>
		<p>
			<em><strong>L'équipe BENU SLO0W</strong></em>
		</p>
	</div>
</body>
</html>