@extends('layouts.master')

@section('content')

<chat
    :user="{{ auth()->user() }}"
    :friends="{{ $contacts }}"
    asset="{{ asset('storage') }}"
/>

@endsection
