@extends("layouts/master")

@section('content')
    <travel-component csrf_token="{{ csrf_token() }}"></travel-component>
@endsection