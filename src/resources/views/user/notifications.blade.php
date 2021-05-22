@extends('user.dashboard')

@section('dashboard_title') Notifications @stop

@section('dashbord_content')

       @foreach ($notifications as $i => $item)

       <div class="notification border rounded p-2">
        <div class="card card-header text-black-50">
            <div class="d-flex justify-content-between">
                <a class="" data-toggle="collapse" href="#collapse-{{ $i }}" role="button" aria-expanded="false" aria-controls="collapse-{{ $i }}">
                    <div><i class="fa fa-bell icon-notif text-success mr-2"></i>Notification N°{{ $i + 1 }} du {{ getDayFormat($item->created_at) }} à {{ getTimeFormat($item->created_at) }}</div>
                </a>
                <div>
                    <a class="text-danger" href="#"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    <div class="collapse" id="collapse-{{ $i }}">
        <div class="card card-body">
            {!! $item->data['message'] !!}
        </div>
    </div>
</div>
           
       @endforeach


@endsection