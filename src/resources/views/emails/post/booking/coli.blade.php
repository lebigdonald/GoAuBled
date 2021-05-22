@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Reservation
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <td class="paragraph">
        Bonjour {{ $user }}
        Vous venez d’effectuer une demande de réservation de colis aux catégories suivantes: <br>
        <b>Details de la Reservation</b>
        <br>
        <table style="width:100%; border: 1px solid black;">
            <tr>
                <th style="border: 1px solid black;">#</th>
                <th style="border: 1px solid black;">Object</th>
                <th style="border: 1px solid black; text-align: right">Quantité</th>
            </tr>
            @foreach($objects as $key => $value)
                @if($value->qte > 0)
                    <tr>
                        <td style="border: 1px solid black;">{{ $key + 1 }}</td>
                        <td style="border: 1px solid black;">{{ $value->name }}</td>
                        <td style="border: 1px solid black; text-align: right">{{ $value->qte }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
        <br>
        Sur le post de Mr/M {{ $owner }} en la date du {{ $dateFrom }}
        Pour le trajet <strong>{{ $from }}</strong> vers <strong>{{ $to }}</strong>.
        Nous vous notifierons sur l’étape de payement si le voyageur est d’accord de transporter vos colis. Dans le cas contraire vous allez recevoir un message refus.
    </td>
    <tr>
        <td width="100%" height="25">
            @include('beautymail::templates.minty.button', ['text' => "Acceder á la page d'accueil", 'link' => $url])
        </td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
