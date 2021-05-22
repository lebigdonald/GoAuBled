@extends('layouts.master')

@section('content')

<app-component :user="{{ auth()->user() }}"></app-component>

@endsection
    