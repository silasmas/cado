@component('mail::message')
# {{ $type == 'success' ? 'Félicitation ' : 'Bonjjour ' }} {{ $user->prenom . ' ' . $user->name }}
     
Votre inscription à bien été validé!!

@component('mail::panel')
@if ($type == 'success')
            @if ($session->live == true && $session->isform == false)
                 'La réservation du live *{{ $session->titre }}*  est faite avec succès. Verfifiez votre compte pour plus de details
            @else
                L'achat de la Formation *{{ $session->titre }}* à réussit.
                 Verfifiez votre compte pour le suivre.
            @endif
        @else 
            @if ($session->live == true && $session->isform == false)
                La réservation du live {{ $session->titre }} a échoué. Verfifiez votre compte pour plus de details
            @else
                L'achat de la Formation  *{{ $session->titre }}* à échoué. 
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
