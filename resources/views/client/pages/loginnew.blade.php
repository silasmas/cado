
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}  Login</title>
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
                        <h1>Connexion</h1>
                        
                        <div class="col-md-12  text-danger mb-5">
                            @foreach ($errors->all() as $err)
                                {{$err}}
                            @endforeach
                            {{ session('status') }}
                        </div>
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row g-5 g-lg-5">
                                <div class="col-lg-12">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
                                    required autofocus>
                                    <div class="icon">
                                       @
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input  class="form-control" placeholder="Mot de passe" type="password"
                                    name="password"
                                    required autocomplete="current-password" >
                                    <div class="icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="reset">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                   <a href="{{ route('password.request') }}" class="reset">Mot de passe oubliez ?</a>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="btn mb-4" type="submit">Se connecter</button>
                                    <p>Ou</p>
                                    <a href="{{ route('registerUser') }}" class="reset">S'inscrire</a>
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
