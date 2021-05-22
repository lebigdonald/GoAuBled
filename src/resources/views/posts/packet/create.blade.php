@extends("layouts/master")

@section('content')
    <coli-component csrf_token="{{ csrf_token() }}"></coli-component>
@endsection