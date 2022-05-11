@extends('client.templates.template_login',['titre'=>"Inscription"])


@section('content')
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
                        <form method="POST" action="{{ route('register') }}" data-parsley-validate>
                            @csrf
                            <div class="form-group row g-5">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control"  id="name" value="{{ old('name') }}" 
                                     name="name"placeholder="Nom" required data-parsley-minlength="3" data-parsley-trigger="change">
                                    <div class="icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control"  id="prenom" value="{{ old('prenom') }}" 
                                     name="prenom"placeholder="Prenom" required data-parsley-minlength="3" data-parsley-trigger="change">
                                    <div class="icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control"  id="phone" value="{{ old('phone') }}" 
                                     name="phone"placeholder="Telephone (+2438200000000)" required data-parsley-minlength="3" data-parsley-trigger="change">
                                    <div class="icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                     value="{{ old('email') }}" required data-parsley-minlength="3" data-parsley-trigger="change">
                                    <div class="icon">
                                       @
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input id="password" class="form-control" placeholder="Mot de passe" type="password"
                                    name="password" required data-parsley-minlength="3" data-parsley-trigger="change"
                                     autocomplete="new-password">
                                    <div class="icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" id="password_confirmation"
                                    name="password_confirmation" required data-parsley-minlength="3" data-parsley-trigger="change" 
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
        @endsection
