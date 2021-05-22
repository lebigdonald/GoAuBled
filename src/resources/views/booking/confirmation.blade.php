@extends('layouts.master')

@section('content')
<div class="container mt-5 mb-5 table-verify">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">confirmation de reservation</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        le nombre de Kilos disponible a ete modifier
                    </div>

                    merci pour avoir accepter la reservation de (ici viens le nom de la personne) <br>
                    pour le post (une description du post) il vous reste exactement tels nombre de kilos.
                    <a class="btn btn-link p-0 m-0 align-baseline" href="{{ route('accueil') }}">continuer sur la page d accueil</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection