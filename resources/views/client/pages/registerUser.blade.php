
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}" />
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
                <div class="col-lg-6 d-flex justify-content-center align-items-center col-md-6">
                    <div class="card card-login">
                            <a href="/" class="me-auto ms-auto mb-2">
                                <img src="{{ asset('assets/logo/logo-white.png') }}" height="100" width="100"/>
                            </a>
                            <h2 class="mb-5">Bienvenue à Cado</h2>
                        <h1>Inscription</h1>
                        <div class="col-md-12  text-danger mb-5">
                            @foreach ($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row g-5">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control"  id="name" value="{{ old('name') }}" 
                                     name="name"placeholder="Nom" required>
                                    <div class="icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                     value="{{ old('email') }}" required>
                                    <div class="icon">
                                       @
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input id="password" class="form-control" placeholder="Mot de passe" type="password"
                                    name="password"
                                    required autocomplete="new-password">
                                    <div class="icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" id="password_confirmation"
                                    name="password_confirmation" required 
                                     class="form-control" placeholder=" Confirmer le mot de passe">
                                    <div class="icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    {{-- <button class="btn mb-4">Inscription</button> --}}
                                    <button class="btn mb-4">S'inscrire</button>
                                    <p>Ou</p>
                                    <a href="/" class="reset">Se connecter</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
