@extends('layouts.master')


@section('content')

    <travel-booking 

    :user="{{ $user }}" 
    :travel="{{ $travel }}" 
    :log_user="{{ $log_user }}"
    :posts="{{ $posts }}"

    ></travel-booking>

@stop
