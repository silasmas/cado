@extends('client.templates.template_login',['titre'=>"Login"])


@section('content')
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
                        <form  method="POST" action="{{ route('login') }}" data-parsley-validate>
                            @csrf
                            <div class="form-group row g-5 g-lg-5">
                                <div class="col-lg-12">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
                                     autofocus required data-parsley-minlength="3" data-parsley-trigger="change">
                                    <div class="icon">
                                       @
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input  class="form-control" placeholder="Mot de passe" type="password"
                                    name="password"
                                    required autocomplete="current-password" required data-parsley-minlength="3" data-parsley-trigger="change">
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
        @endsection