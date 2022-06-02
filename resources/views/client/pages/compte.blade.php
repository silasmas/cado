<div class="user-dashboard-content">
    <div class="content-title-box">
        <div class="title">{{ $titre }}</div>
        <div class="subtitle">Modifiez les paramètres de votre compte.</div>
        @include("client.parties.error")
    </div>
    <form action="{{ url('editCompte') }}" method="post" class='form-group' data-parsley-validate onsubmit="editCompte(this)">
        @csrf
        <div class="content-box">
            <div class="email-group">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" required class="form-control" name="email" id="email" placeholder="Email" value="{{ Auth::user()->email }}" />
                </div>
            </div>
            <div class="password-group">
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" class="form-control" id="current_password" name="oldpassword" placeholder="Entrer voutre actuel mot de passe" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enrer votre nouveau mot de passe" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Répéter le nouveau mot de passe" />
                </div>
            </div>
        </div>
        <div class="content-update-box">
            <button type="submit" class="btn">Enregistrer</button>
        </div>
    </form>
</div>