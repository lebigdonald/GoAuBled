@extends('user.layouts', ['tab' => 'travel'])

@section('main_content')

<div class="page-header d-flex justify-content-between">
    <h1>Vovages</h1>
    <a href="{{ route('travel.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Poster un nouveau voyage
    </a>
</div>

<table class="table table-striped table-sm table-responsive-md border">
    <caption>{{ $posts->count() . ' '. 'Posts'  }}</caption>
    <thead>
    <tr>
        <th class="text-center">Depart</th>
        <th class="text-center">Pour</th>
        <th class="text-center">Du</th>
        <th class="text-center">Au</th>
        <th class="text-center">Kilos disponibles</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td class="text-center">{{ $post->from }}</td>
            <td class="text-center">{{ $post->to }}</td>
            <td class="text-center">{{ $post->dateFrom }}</td>
            <td class="text-center">{{ $post->dateTo }}</td>
            <td class="text-center">{{ $post->kilo }}</td>
            <td class="d-flex justify-content-between">
                <a href="{{ route('users.update', $post) }}" class="btn btn-primary btn-sm">
                    voir les reservations
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
