@component('mail::message')
# Bravo! Mr/me {{ $user->name }}

votre reservation a ete accepter. Merci de continuer a nous faire confiance.

@component('mail::button', ['url' => $url])
clicquez ici pour retourner sur la page d'accueil
@endcomponent

la Team Goaubled <br>
vous remerci

@endcomponent
