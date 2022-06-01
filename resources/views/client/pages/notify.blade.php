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
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-sm-12" style="margin-top:80px">
                <div class="card  mb-3 
                 {{ $data['data']['status'] == 'ACCEPTED' ? 'border-success' : 'border-danger' }}"
                    style="max-width: 50rem;">
                    <div
                        class="card-header bg-transparent {{ $data['data']['status'] == 'ACCEPTED' ? 'border-success' : 'border-danger' }}">
                        Etat de votre paiement
                    </div>
                    <div
                        class="card-body {{ $data['data']['status'] == 'ACCEPTED' ? 'text-success' : 'text-danger' }}">
                        <h2 class="card-title">{{ $message['message'] }}</h2>
                        @if ( $data['data']['status'] == 'ACCEPTED')
                        <p class="card-text">{{$message['mail'] }}</p>                            
                        @endif
                        <p class="card-text">{{  $message['status'] }}</p>
                        <hr>
                        <p>Montant :{{ $data['data']['amount'] . $data['data']['currency'] }}</p>
                        <p>Description :{{ $data['data']['description'] }}</p>
                        <p class="card-text">
                            Date :{{ \Carbon\Carbon::parse($data['data']['payment_date'])->isoFormat('LLL') }}

                        </p>
                    </div>
                    <div
                        class="card-footer bg-transparent  {{ $data['data']['status'] == 'ACCEPTED' ? 'border-success' : 'border-danger' }}">
                       
                        @if ($data['data']['status']=="ACCEPTED")
                        <a type="button"  class="btn btn-outline-success" href="{{ route('dashboard') }}" class="alert-link">Retour à l'accueil</a>
                        @else
                        <a type="button"  class="btn btn-outline-danger"  href="{{ route('panier') }}" class="alert-link">Retour au panier</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
