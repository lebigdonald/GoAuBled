@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Validation de votre Annonce
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Mr/me {{ $user['name'] }}, <br>
            votre annonce voyage {{ $post['from'] }}  pour  {{ $post['to'] }} a ete valider par les admins du groupe
        </td>
    </tr>
    <tr>
        <td width="100%" height="25">
            <br><br><br>
            @include('beautymail::templates.minty.button', ['text' => 'clicker sur le lien pour voir les posts', 'link' => route('posts.index')])
        </td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
