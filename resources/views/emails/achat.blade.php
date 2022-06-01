@component('mail::message')
# Félicitation {{$user->prenom.' '.$user->name}}

@if ($session->live == true && $session->isform == false)
@component('mail::panel')
{{ "La réservation du live "}}<b>{{ $session->titre }}</b>{{ "est faite avec succès. Verfifiez votre compte pour plus de details"  }}
@endcomponent
@else
@component('mail::panel')
{{ "L'achat de la Formation "}}<b>{{ $session->titre }}</b>{{ "" }} {{ "est fait avec succès Verfifiez votre compte pour plus de details"  }}
@endcomponent  
@endif

<p>
    Bénéficiez des nos coachings dans diverse domaine.
</p>
<p>
    Cliquez sur le boutton ci-dessous pour revenir sur le site.
</p>

@component('mail::button', ['url' => config('app.url')])
Retour sur le site {{config('app.name')}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
