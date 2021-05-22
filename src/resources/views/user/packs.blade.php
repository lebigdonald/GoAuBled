@extends('user.layouts', ['tab' => 'packet'])

@section('main_content')

    <div class="page-header d-flex justify-content-between">
        <h1>Packets</h1>
        <a href="{{ route('travel.create') }}" class="btn btn-primary btn-sm align-self-center">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Envoyer un nouveau Packet
        </a>
    </div>

    <table class="table table-striped table-sm table-responsive-md border">
        <caption>{{ $posts->count() . ' '. 'Posts'  }}</caption>
        <thead>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Biens</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td class="">{{ $post->from }}</td>
                <td class="">{{ $post->to }}</td>
                <td>{{ $post->dateFrom }}</td>
                <td class="d-flex justify-content-between">
                    <span>Lettres</span>
                    <span>Lettres</span>
                    <span>Lettres</span>
                </td>
                <td></td>
                <td class="d-flex justify-content-between">

                    <a href="{{ route('users.update', $post) }}" class="btn btn-primary btn-sm">
                        voir les Reservations
                    </a>

                    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['users.update', $post], 'class' => 'form-inline', 'data-confirm' => __('forms.posts.delete')]) !!}
                    {!! Form::button('supprimer', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
