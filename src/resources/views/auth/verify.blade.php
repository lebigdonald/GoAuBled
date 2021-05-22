@extends('layouts.master')

@section('content')
<div class="container mt-5 mb-5 table-verify">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">veuiller verifier votre compte s'il vous plait!</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un mail á été envoyer a votre adresse email.
                        </div>
                    @endif

                        Avant de continuer veuiller clicquer sur le lien apparant dans ce mail Merci !
                        Au cas ou vous n avez recue de mail veuiller clicker ici !,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Nouveu mail svp</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
