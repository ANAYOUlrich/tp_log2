@component('mail::message')
# El-Elyon Pay

Vous avez demander un renouvellement de votre vos de passe.<br>
Votre nouveau mot de passe est : <b>{{$new_password}}</b>

@component('mail::button', ['url' => "$app_url/admin/auth/login"])
Connexion
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
