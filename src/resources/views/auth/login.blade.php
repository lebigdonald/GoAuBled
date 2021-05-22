@extends('layouts.master')

@section('content')

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5 bg-poster">
                        <img src="{{ getSectionData('header')->image }}" height="500px" alt="login"
                             class="login-card-img" style="object-fit: cover;">
                    </div>
                    <div class="col-md-7 bg-poster">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <h4><a href="{{route('accueil')}}" class="scrollto">Go<span>AuBled</span></a> -
                                    Connexion</h4>
                            </div>
                            <div class="login-card-footer-nav block-media-login my-4">
                                <a href="{{ route('facebook') }}"
                                   class="btn btn-block btn-social btn-facebook text-white">
                                    <span class="fa fa-facebook"></span> Continuer avec facebook
                                </a>
                                <a href="{{ route('google') }}" class="btn btn-block btn-social btn-google text-white">
                                    <span class="fa fa-google"></span> Continuer avec google
                                </a>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="Email address">
                                    @error('email')<span class="error small">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="***********">
                                    @error('password')<span class="error small">{{ $message }}</span>@enderror
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4 bg-dark text-white"
                                       type="submit" value="Login">
                            </form>
                            <div class="row pt-4">
                                <div class="col-6">
                                    <a href="{{route('password.update')}}" class="forgot-password-link pt-4 border p-3 text-uppercase">Mot de passe oublier ?</a>
                                </div>
                                <div class="col-6 login-card-footer-text">
                                    <a href="{{ route('register') }}" class="text-reset mx-3 border p-3 text-uppercase">creer
                                        un compte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modification du Mot de Passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop
