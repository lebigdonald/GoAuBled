@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Bonjour {{ $name }}
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Je t’invite à me rejoindre dans la communauté [Goaubled], la plateforme de référence d’envoi de colis entre particuliers Pour plus d’informations;
            bien vouloir t’inscrire directement ou accéder la page d’accueil en cliquant sur:
        </td>
    </tr>
    <tr style="display: flex; justify-content: space-around; align-items: center;padding: 25px 25px">
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'Inscription', 'link' => route('register')])
        </td>
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'Accueil', 'link' => route('accueil')])
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
