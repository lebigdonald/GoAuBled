@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Nouveau message de {{ $name }}
        </td>
    </tr>
    <tr>
        <td class="paragraph">
           {{  $content }}
        </td>
    </tr>
    <tr>
        <td width="100%" height="25">
            <br>
            <strong>Cordialement</strong>,<br>
            <strong>Team Go Au Bled</strong>
        </td>
        <br><br><br>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
