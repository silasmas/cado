
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title print-hidden"> {{ isset($titre) ? $titre : '' }}</h1>
                <ul class="print-hidden">
                    <li class="{{ $titre=="Mes formations"?"active":"" }}"><a href="{{ route('mesCours') }}">Mes conférences</a></li>

                    <li class="{{ $titre=="Mes favories"?"active":"" }}"><a href="{{ route('favorie') }}">Mes favories</a></li>

                    <li class="{{ $titre=="Mon historique d'achats"?"active":"" }}"><a href="{{ route('historique') }}">Historique d'achat</a></li>

                    <li class="{{ $titre=="Mon Profil"?"active":"" }}"><a href="{{ route('profil') }}">Profil</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>