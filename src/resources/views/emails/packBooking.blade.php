@component('mail::message')
# Proposition de transport.

Mr/me {{ $user['name'] }} se propose pour le transpor de votre colis.
le post choissit pour le transport est : 
<hr>

## depart: {{ $post['from'] }}
## arrivee: {{ $post['to'] }}
## date de depart: {{ $post['dateFrom'] }}
## date d'arrivee: {{ $post['dateTo'] }}
## Kilos disponibles: {{ $post['kilo'] }}

@component('mail::button', ['url' => $url . '/?k=pack'])
lien de confirmation
@endcomponent

Merci,<br>
La Team Goaubled
@endcomponent