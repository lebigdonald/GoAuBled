@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            <b>Confirmation de reservation</b>
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Mr/me {{ $name }} votre reservation de <strong>{{ 10 . ' Kg' }}</strong>  du {{ formatDate($reservation_date) }} a ete confirmer.
            <br>
            <b>Details de la Reservation</b>
            <br>
            <table style="width:100%; border: 1px solid black;">
                <tr>
                    <th style="border: 1px solid black;">#</th>
                    <th style="border: 1px solid black;">Object</th>
                    <th style="border: 1px solid black; text-align: right">Quantité</th>
                </tr>
                @if($bookedObjects->kilo)
                    <tr>
                        <td style="border: 1px solid black;">1</td>
                        <td style="border: 1px solid black;">Kilos</td>
                        <td style="border: 1px solid black; text-align: right">{{ $bookedObjects->kilo . 'Kg' }}</td>
                    </tr>
                @endif
                @if($bookedObjects->envelopes)
                    <tr>
                        <td style="border: 1px solid black;">2</td>
                        <td style="border: 1px solid black;">Envelopes</td>
                        <td style="border: 1px solid black; text-align: right">{{ $bookedObjects->envelopes }}</td>
                    </tr>
                @endif
                @if($bookedObjects->phones)
                    <tr>
                        <td style="border: 1px solid black;">3</td>
                        <td style="border: 1px solid black;">Telephones</td>
                        <td style="border: 1px solid black; text-align: right">{{ $bookedObjects->phones }}</td>
                    </tr>
                @endif
                @if($bookedObjects->laptops)
                    <tr>
                        <td style="border: 1px solid black;">4</td>
                        <td style="border: 1px solid black;">Laptops</td>
                        <td style="border: 1px solid black; text-align: right">{{ $bookedObjects->laptops }}</td>
                    </tr>
                @endif
            </table>
            <br>
            Pour procéder au payment veuillez clicker sur le lien ici bas pour éffectuer le payment avec Paypal.
        </td>
    </tr>
    <tr style="display: flex; justify-content: space-between;padding: 10px 10px">
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'payer avec paypal', 'link' => route('booking.pay', ['user' => $user_id, 'reservation' => $id ]) ])
        </td>
    </tr>
    <tr>
        <td style="padding: 20px">
            <strong>Cordialement</strong>,<br><br>
            <strong>Team Go Au Bled</strong>
        </td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
