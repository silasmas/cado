@component('mail::message')
# {{ $type == 'success' ? 'Félicitation ' : 'Bonjour ' }} {{ $user->prenom . ' ' . $user->name }}
     

@component('mail::panel')
@if ($type == 'success')
            @if ($session->live == true && $session->isform == false)
                 'La réservation du live <b>{{ $session->titre }}</b> est faite avec succès. Verfifiez votre compte pour plus de details
            @else
                L'achat de la Formation <b>{{ $session->titre }}</b> à réussit.
                 Verfifiez votre compte pour le suivre.
            @endif
        @else 
            @if ($session->live == true && $session->isform == false)
                 La réservation du live <b>{{ $session->titre }}</b> a échoué. Verfifiez votre compte pour plus de details
            @else
                L'achat de la Formation  <b>{{ $session->titre }}</b> à échoué. 
                 Verfifiez votre compte pour plus de details.
            @endif

        @endif
@endcomponent

Bénéficiez des nos coachings dans diverse domaine.

Cliquez sur le boutton ci-dessous pour revenir sur le site.
<br>
@component('mail::button', ['url' => config('app.url')])
Retour sur le site {{config('app.name')}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
