<div class="content-title-box">
    <div class="title">Profile</div>
    <div class="subtitle">Ajoutez des informations vous concernant à partager sur votre
        profil.</div>
    @include('client.parties.error')
</div>
<form action="{{ url('editProfil') }}" method="post" class='form-group' data-parsley-validate>
    @csrf
    <div class="content-box">
        <div class="basic-group">
            <div class="form-group">
                <label for="FristName">Nom :</label>
                <input type="text" class="form-control" name="name" id="FristName" placeholder="First name"
                    value="{{ Auth::user()->name }} " required data-parsley-minlength="3"
                    data-parsley-trigger="change" />
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
                <label for="FristName">Téléphone :</label>
                <input type="text" class="form-control" name="phone" placeholder="+243820000000"
                    value="{{ Auth::user()->phone }}" required data-parsley-minlength="3"
                    data-parsley-trigger="change" />
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

            <div class="content-update-box">
                <button type="submit" class="btn">Save</button>
            </div>
</form>
