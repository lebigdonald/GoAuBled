@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Bienvenue Mr/me {{$name}}
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Vous avez enregistré un compte sur [Goaubled]. <br>
            Avant de pouvoir utiliser votre compte, vous devez vérifier qu'il s'agit bien de votre adresse électronique en cliquant ici: [lien]
        </td>
    </tr>
    <tr>
        <td width="100%" height="25">
            <br><br><br>
            @include('beautymail::templates.minty.button', ['text' => 'valider votre compte', 'link' => route('accueil')])
        </td>
    </tr>
    <tr>
        <td width="100%" height="25">
            <br><br>
            <strong>Cordialement</strong>,<br><br>
            <strong>Team Go Au Bled</strong>
        </td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
