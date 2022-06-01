@component('mail::message')
# Bienvenue {{$user->prenom.' '.$user->name}}

{{ $data['message'] }}

@component('mail::panel')
Bénéficiez des nos coachings dans diverse domaine.<br>
Cliquez sur le boutton ci-dessous pour revenir sur le site.
@endcomponent
<br>
@component('mail::button', ['url' => config('app.url')])
Aller sur {{config('app.name')}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
