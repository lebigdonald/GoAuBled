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
    <tr>
        <td class="paragraph">
            Mr/me {{ $owner }} vous avez recue une nouvelle Reservation de <strong>{{ $objects->kilo }}</strong> de de la part
            de {{ $user }}. <br>
            <b>Details de la Reservation</b>
            <br>
            <table style="width:100%; border: 1px solid black;">
                <tr>
                    <th style="border: 1px solid black;">#</th>
                    <th style="border: 1px solid black;">Object</th>
                    <th style="border: 1px solid black; text-align: right">Quantité</th>
                </tr>
                @if($objects->kilo)
                <tr>
                    <td style="border: 1px solid black;">1</td>
                    <td style="border: 1px solid black;">Kilos</td>
                    <td style="border: 1px solid black; text-align: right">{{ $objects->kilo . 'Kg' }}</td>
                </tr>
                @endif
                @if($objects->envelopes)
                <tr>
                    <td style="border: 1px solid black;">2</td>
                    <td style="border: 1px solid black;">Envelopes</td>
                    <td style="border: 1px solid black; text-align: right">{{ $objects->envelopes }}</td>
                </tr>
                @endif
                @if($objects->phones)
                <tr>
                    <td style="border: 1px solid black;">3</td>
                    <td style="border: 1px solid black;">Telephones</td>
                    <td style="border: 1px solid black; text-align: right">{{ $objects->phones }}</td>
                </tr>
                @endif
                @if($objects->laptops)
                <tr>
                    <td style="border: 1px solid black;">4</td>
                    <td style="border: 1px solid black;">Laptops</td>
                    <td style="border: 1px solid black; text-align: right">{{ $objects->laptops }}</td>
                </tr>
                @endif
            </table>
            <br>
            pour confirmer cette reservation veuillez clicker sur
            le lien si dessous.
        </td>
    </tr>
    <tr style="display: flex; justify-content: space-between;padding: 10px 10px">
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'Clicker sur le lien pour confirmer', 'link' => $confirmLink  . '?bookedKilo=' . $objects->kilo .'&bookingId='. $bookingId ])
        </td>
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'Clicker sur le lien pour refuser', 'link' => $cancelLink])
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
