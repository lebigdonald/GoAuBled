@component('mail::message')
# Confirmation de Reservation de {{ $kilos }} Kilos.

Mr/me {{ $owner['name'] }} vous avez recue une nouvelle Reservationde de la part
de {{ $user->name }}. pour confirmer cette reservation veuillez clicker sur
le lien si dessous.

@component('mail::button', ['url' => $url . '/?k=' . $kilos . '&book_id=' . $booking . '&action=true' ])
lien de confirmation
@endcomponent

@component('mail::button', ['url' => $url . '/?k=' . $kilos . '&book_id=' . $booking . '&action=false' ])
refuser
@endcomponent

Merci,<br>
La Team Goaubled
@endcomponent