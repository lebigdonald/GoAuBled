@extends('user.layouts', ['tab' => 'travel'])

@section('main_content')

    <div class="page-header d-flex justify-content-between">
        <h1>Reservations</h1>
        <a href="{{ route('travel.create') }}" class="btn btn-primary btn-sm align-self-center">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Poster un nouveau voyage
        </a>
    </div>

    <table class="table table-striped table-sm table-responsive-md border">
        <caption>{{ $posts->count() . ' '. 'Posts'  }}</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Depart</th>
            <th scope="col">Date</th>
            <th scope="col">Kilos</th>
            <th scope="col">Date de reservation</th>
            <th scope="col">Date de confirmation</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reservations as $index => $item)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ findPostWithId($item->post_id)->from }}</td>
                <td>{{ findPostWithId($item->post_id)->dateFrom }}</td>
                <td>{{ $item->kilos }}</td>
                <td>{{ $item->reservation_date }}</td>
                <td>{{ $item->validation_date }}</td>
                <td>
                    @if ($item->status == "in_progress")
                        <span class="badge badge-info">en cours...</span>
                    @elseif($item->status == "rejected")
                        <span class="badge badge-danger">rejeter</span>
                    @elseif($item->status == "accepted")
                        <span class="badge badge-success">confirmer</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
