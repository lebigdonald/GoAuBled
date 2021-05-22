@extends('layouts.master')

@section('content')
    <main class="d-flex align-items-center min-vh-100 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5 bg-poster">
                        <img src="{{ getSectionData('about')->image }}" height="400px" alt="login" class="login-card-img" style="object-fit: cover;">
                    </div>
                    <div class="col-md-7 bg-poster">
                        <div class="card-body">

                            <div class="card-body">
                                <h5 class="text-center quigo-title">Changement du Mot de passe</h5>
                                <form class="form-signin" method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email adresse" name="email">
                                        @error('email')<span class="error small">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="mot de passe" name="password">
                                        @error('password')<span class="error small">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="confirmation du mot de passe" name="password_confirmation">
                                    </div>

                                    <button class="btn btn-lg btn-recherche text-white text-uppercase" type="submit">modifier le mot de passe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

