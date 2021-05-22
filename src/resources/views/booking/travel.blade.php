@extends('layouts.master')

@section('content')
    <booking-travel-component 
        :post="{{ $post }}" 
        :owner="{{ $user }}"
        path="{{ route('accueil') }}" 
        :current-user="{{ auth()->user() }}"
        asset="{{ asset('storage') }}"
    />
@endsection