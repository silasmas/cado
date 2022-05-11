<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Notification du paiement</title>
    <link rel="shortcut icon" type="image/rdp-icon" href="{{ asset('assets/logo/logoan.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body class="antialiased">

    
    <div class="container">
        <div class="alert {{ $data['data']['status']=="ACCEPTED"?"alert-success":"alert-danger" }} " role="alert">
       
        <h1>{{ $data['message'] }}</h1>
        <h2>{{ isset($etat)?$etat:""}}</h2>
        <p>{{ $data['data']['status'] }}</p>
        <hr>
        <p>Montant :{{ $data['data']['amount'] . $data['data']['currency'] }}</p>
        <p>Opérateur : {{ isset($operateur)?$operateur:"absent"}}</p>
        <p>Description :{{ $data['data']['description'] }}</p>
        <p>Date :{{ $data['data']['payment_date'] }}</p><br>
        @if ($data['data']['status']=="ACCEPTED")
        <a href="{{ route('dashboard') }}" class="alert-link">Retour à l'accueil</a>
        @else
        <a href="{{ route('panier') }}" class="alert-link">Retour au panier</a>
        @endif
      
    </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
