
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}" />
</head>
<body>
    <section class="block-login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 ps-0">
                    <div class="bg d-flex justify-content-center align-items-center">
                        <a href="/" class="me-auto ms-auto mb-3">
                            <img src="{{ asset('assets/logo/logoan.png') }}" height="100" width="100"/>
                        </a>
                        <h2>Bienvenue à Cado</h2>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="card card-login">
                        <h1>Connexion</h1>
                        <form action="">
                            <div class="form-group row g-5">
                                <div class="col-lg-12">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <div class="icon">
                                       @
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control" placeholder="Mot de passe">
                                    <div class="icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                   <a href="#" class="reset">Mot de passe oubliez ?</a>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="btn mb-4">Se connecter</button>
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
