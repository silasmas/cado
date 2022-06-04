@component('mail::message')
    # {{ $type == 'success' ? 'Félicitation ' : 'Bonjjour ' }} {{ $user->prenom . ' ' . $user->name }}
    @if ($type == 'success')
        @component('mail::panel')
            @if ($session->live == true && $session->isform == false)
                {{ 'La réservation du live ' }}<b>{{ $session->titre }}</b>{{ ' est faite avec succès. Verfifiez votre compte pour plus de details' }}
            @else
                {{ "L'achat de la Formation " }}<b>{{ $session->titre }}</b>
                {{ ' à réussit. Verfifiez votre compte pour le suivre.' }}
            @endif
        @endcomponent
    @else
        @component('mail::panel')
            @if ($session->live == true && $session->isform == false)
                {{ 'La réservation du live ' }}<b>{{ $session->titre }}</b>{{ ' a échoué. Verfifiez votre compte pour plus de details' }}
            @else
                {{ "L'achat de la Formation " }}<b>{{ $session->titre }}</b>
                {{ ' à échoué. Verfifiez votre compte pour plus de details.' }}
            @endif
        @endcomponent
    @endif

    <p>
        Bénéficiez des nos coachings dans diverse domaine.
    </p>
    <p>
        Cliquez sur le boutton ci-dessous pour revenir sur le site.
    </p>

    @component('mail::button', ['url' => config('app.url')])
        Retour sur le site {{ config('app.name') }}
    @endcomponent

    Merci,<br>
    {{ config('app.name') }}
@endcomponent
