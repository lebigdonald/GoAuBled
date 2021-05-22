@extends('layouts.master')

@section('content')
<div class="container mt-5 mb-5 table-verify">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Votre demande a ete rejeter !</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        Le titulaire du Post a rejeter votre demande
                    </div>
                    <a class="btn btn-link p-0 m-0 align-baseline" href="{{ route('accueil') }}">continuer sur la page d accueil</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection