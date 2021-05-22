@extends('layouts.master')


@section('content')

    @livewire('packs-reservation',['pack' => $pack, 'user' => $user])

@stop
