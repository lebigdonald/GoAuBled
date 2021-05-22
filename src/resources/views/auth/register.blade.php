@extends('layouts.master')


@section('content')
    <main class="d-flex align-items-center min-vh-100 py-5 my-5 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5 bg-poster">
                        <img src="{{ getSectionData('about')->image }}" height="630px" alt="login" class="login-card-img" style="object-fit: cover;">
                    </div>
                    <div class="col-md-7 bg-poster">
                        <div class="card-body">

                            <div class="brand-wrapper mb-2">
                                <h4><a href="{{route('accueil')}}" class="scrollto">Go<span>AuBled</span></a> - Inscription</h4>
                            </div>
                            {!! Form::model(['method' => 'POST', 'route' => ['register'], 'files' => true]) !!}

                            <div class="form-group row">
                                {!! Form::label('name', 'Nom', ['class' => 'col-sm-2 col-form-label']) !!}

                                <div class="col-sm-12">
                                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nom', 'required']) !!}

                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-12 col-form-label']) !!}

                                <div class="col-sm-12">
                                    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email Adresse', 'required']) !!}

                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password', 'Password', ['class' => 'col-sm-12 col-form-label']) !!}

                                <div class="col-sm-12">
                                    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password', 'required']) !!}

                                    @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password_confirmation', 'Mot de passe de confirmation', ['class' => 'col-sm-12 col-form-label']) !!}

                                <div class="col-sm-12">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password', 'required']) !!}

                                    @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Creer votre compte', ['class' => 'btn text-white btn-recherche']) !!}
                            </div>

                            {!! Form::close() !!}

                            <p class="login-card-footer-text">deja un compte? <a href="{{ route('login') }}" class="text-reset mx-3 text-uppercase border p-2">Login</a></p>
                            <div class="login-card-footer-nav block-media-login my-4">
                                <a href="{{ route('facebook') }}" class="btn btn-block btn-social btn-facebook text-white">
                                    <span class="fa fa-facebook"></span> Continuer avec facebook
                                </a>
                                <a href="{{ route('google') }}" class="btn btn-block btn-social btn-google text-white">
                                    <span class="fa fa-google"></span> Continuer avec google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  @stop
