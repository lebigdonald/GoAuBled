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
            Bienvenue au sein de la communauté [Goaubled]. Merci d’avoir créé un compte sur notre plateforme. Nous vous souhaitons un agréable moment parmi nous.
            <br> Pour plus d’informations; bien vouloir accéder directement notre page d’accueil en cliquant sur accéder l’accueil.
        </td>
    </tr>
    <tr>
        <td width="100%" height="25">
            <br><br><br>
            @include('beautymail::templates.minty.button', ['text' => 'Accéder à l‘accueil', 'link' => route('accueil')])
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
