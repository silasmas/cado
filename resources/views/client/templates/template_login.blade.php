
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ isset($titre) ? $titre : '' }}</title>
    <link rel="shortcut icon" type="image/rdp-icon" href="{{ asset('assets/logo/logoan.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/parsley/parsley.css') }}">

</head>
<body>
    <section class="block-login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 ps-0 col-md-6">
                    <div class="bg d-flex justify-content-center align-items-center">
                        <a href="/" class="me-auto ms-auto mb-3">
                            <img src="{{ asset('assets/logo/logo-white.png') }}" height="100" width="100"/>
                        </a>
                        <h2>Bienvenue à Cado</h2>
                    </div>
                </div>
@yield('content')

            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/parsley/js/parsley.js') }}"></script>
<script src="{{ asset('assets/parsley/i18n/fr.js') }}"></script>
</body>
</html>
