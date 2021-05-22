@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <h2 class="text-center">FAQ</h2>

   <faq-component :faqs="{{ $faqs  }}"></faq-component>

</div>

@endsection
