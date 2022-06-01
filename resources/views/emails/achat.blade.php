@component('mail::message')
# Félicitation {{$user->prenom.' '.$user->name}}


@component('mail::panel')
{{ $data['message'] }}
@endcomponent
{{ "Bénéficiez des nos coachings dans diverse domaine.".<br>."
Cliquez sur le boutton ci-dessous pour revenir sur le site." }}
<br>
@component('mail::button', ['url' => config('app.url')])
Retour sur le site {{config('app.name')}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
