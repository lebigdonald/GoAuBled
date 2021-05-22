@extends('user.dashboard')

@section('dashboard_title') Profile | {{ $user->name }} @stop

@section('dashbord_content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-2 border pt-2">
            <div class="text-center">
                @if (Auth::user()->avatar_original)
                    <img src="{{Auth::user()->avatar_original}}" class="avatar img-circle img-thumbnail" alt="{{ $user->name }}">
                @else
                    <img src="{{Auth::user()->avatar ? asset('storage/UsersAvatars/'.Auth::user()->avatar) :  asset('/img/logo.png') }}" class="avatar img-circle img-thumbnail">
                @endif
            </div><br>
        </div>
        <div class="col-md-10 pt-2">
            <form class="form" action="{{ route('user.profile',$user->id) }}" method="post" id="registrationForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                @error('name')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                              <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" name="prenom" value="{{ $user->profile ? $user->profile->prenom : '' }}" id="prenom">
                                @error('prenom')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                @error('email')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                               <label for="birthDay">Date de Naissance</label>
                                <input type="date" class="form-control" name="birthDay" id="birthDay" value="{{ $user->profile ? getDayFormat($user->profile->birthDay) : '' }}">
                                @error('birthDay')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="ville">ville</label>
                                <input type="text" class="form-control" name="ville" id="ville" value="{{ $user->profile ? $user->profile->ville : '' }}">
                                @error('ville')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="Pays">Pays</label>
                                <input type="text" class="form-control" name="pays" id="Pays" value="{{ $user->profile ? $user->profile->pays : '' }}">
                                @error('pays')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="rue">Rue</label>
                                <input type="text" class="form-control" name="rue" id="rue" value="{{ $user->profile ? $user->profile->rue : '' }}">
                                @error('rue')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">Telephone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->profile ? $user->profile->phone : '' }}">
                                @error('phone')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')<span class="text-danger ml-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                              <label for="password2">Mot de passe de Verification</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password2">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-success btn-recherche text-center" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Enregistrer votre nouveau profile</button>
            </form>
        </div>
    </div>
</div>

@endsection
