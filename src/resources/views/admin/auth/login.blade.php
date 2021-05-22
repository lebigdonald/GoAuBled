@extends('admin.auth.layouts')


@section('content')

    <div class="container w-100 h-100">
        <div class="d-flex justify-content-center align-items-center">
            <div class="jumbotron">
                <h1 class="display-4">Login | Admin</h1>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="">
                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre email">
                            @error('email')<span class="text-left text-red small">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="email" placeholder="Entrer votre Mot de passe">
                            @error('password')<span class="text-left text-red small">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
