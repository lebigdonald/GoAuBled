@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <user-profile :user="{{ $user  }}"></user-profile>
    </div>

@endsection
