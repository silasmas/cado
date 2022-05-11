@extends('client.templates.main_template',['titre'=>"Profil"])

@section('autres_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/parsley/parsley.css') }}">
@endsection
@section('content')
    @include('client.pages.sousMenu')
    <section class="user-dashboard-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-dashboard-box">

                        <div class="user-dashboard-content">
                            <div class="content-title-box">
                                <div class="title">Profile</div>
                                <div class="subtitle">Ajoutez des informations vous concernant à partager sur votre
                                    profil.</div>
                                @if (session()->has('message'))
                                    <div class="col-md-12 col-md-offset-3">
                                        <div class="alert alert-danger alert-dismissable">
                                            {{ session()->get('message') }}
                                        </div>
                                    </div><br>
                                @endif
                                <div class="col-md-12  text-danger mb-1">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ url('editProfil') }}" method="post" class='form-group' data-parsley-validate>
                                @csrf
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="FristName">Nom :</label>
                                            <input type="text" class="form-control" name="name" id="FristName"
                                                placeholder="First name" value="{{ Auth::user()->name }} " required
                                                data-parsley-minlength="3" data-parsley-trigger="change" />
                                            @if ($errors->has('name'))
                                                <small class="invalid-feedback  text-danger" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">Prenom :</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Last name"
                                                value="{{ Auth::user()->prenom }}" required data-parsley-minlength="3"
                                                data-parsley-trigger="change" />
                                            @if ($errors->has('prenom'))
                                                <small class="text-danger text-danger" role="alert">
                                                    <strong>{{ $errors->first('prenom') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">sexe :</label>
                                            <input type="text" class="form-control" name="sexe" placeholder="sexe"
                                                value="{{ Auth::user()->sexe }}" required data-parsley-minlength="3"
                                                data-parsley-trigger="change" />
                                            @if ($errors->has('sexe'))
                                                <small class="text-danger text-danger" role="alert">
                                                    <strong>{{ $errors->first('sexe') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">VIlle :</label>
                                            <input type="text" class="form-control" name="ville" placeholder="Ville"
                                                value="{{ Auth::user()->ville }}" required data-parsley-minlength="3"
                                                data-parsley-trigger="change" />
                                            @if ($errors->has('ville'))
                                                <small class="text-danger text-danger" role="alert">
                                                    <strong>{{ $errors->first('ville') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">Email :</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                value="{{ Auth::user()->email }}" required data-parsley-minlength="3"
                                                data-parsley-trigger="change" />
                                            @if ($errors->has('email'))
                                                <small class="text-danger" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">Téléphone :</label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="+243820000000" value="{{ Auth::user()->phone }}" required
                                                data-parsley-minlength="3" data-parsley-trigger="change" />
                                            @if ($errors->has('phone'))
                                                <small class="text-danger" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="FristName">Pays :</label>
                                            <input type="text" class="form-control" name="pays" placeholder="Pays"
                                                value="{{ Auth::user()->pays }}" required data-parsley-minlength="3"
                                                data-parsley-trigger="change" />
                                            @if ($errors->has('pays'))
                                                <small class="text-danger text-danger" role="alert">
                                                    <strong>{{ $errors->first('pays') }}</strong>
                                                </small>
                                            @endif
                                        </div>

                                        {{-- <div class="form-group">
                                        <label for="Biography">Biography:</label>
                                        <textarea class="form-control" name="biography" 
                                        id="Biography"></textarea>
                                    </div> --}}
                                    </div>
                                    {{-- <div class="link-group">
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="twitter_link" placeholder="Twitter link" value="https://www.twitter.com/john" />
                                        <small class="text-danger">Add your twitter link.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="facebook_link" placeholder="Facebook link" value="https://www.facebook.com/john" />
                                        <small class="text-danger">Add your facebook link.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" maxlength="60" name="linkedin_link" placeholder="Linkedin link" value="https://www.linkedin.com/john" />
                                        <small class="text-danger">Add your linkedin link.</small>
                                    </div>
                                </div>
                            </div> --}}
                                    <div class="content-update-box">
                                        <button type="submit" class="btn">Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('autres_script')
    <script src="{{ asset('assets/parsley/js/parsley.js') }}"></script>
    <script src="{{ asset('assets/parsley/i18n/fr.js') }}"></script>
@endsection
