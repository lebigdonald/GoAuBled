@extends('layouts.master')

@section('content')
    <booking-coli-component 
        :post="{{ $post }}" 
        :owner="{{ $user }}"
        path="{{ route('accueil') }}" 
        :current-user="{{ auth()->user() }}"
        :posts="{{ auth()->user()->posts()->where('categorie_id', 2)->get() }}"
        asset="{{ asset('storage') }}"
    ></booking-coli-component>
@endsection