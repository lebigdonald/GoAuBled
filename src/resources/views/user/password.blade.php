@extends('user.layouts', ['tab' => 'security'])

@section('main_content')
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
    <div class="card">
        <div class="card-body m-5">
            <h1>Modifier votre mot de passe</h1>

            <hr class="my-4">

            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.password.update', $user]]) !!}

            <div class="form-group row">
                {!! Form::label('current_password', 'Mot de passe actuel', ['class' => 'col-sm-4 col-form-label']) !!}

                <div class="col-sm-8">
                    {!! Form::password('current_password', ['class' => 'form-control' . ($errors->has('current_password') ? ' is-invalid' : ''), 'placeholder' => 'Mot de passe actuel', 'required']) !!}

                    @error('current_password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('password', 'Mot de passe', ['class' => 'col-sm-4 col-form-label']) !!}

                <div class="col-sm-8">
                    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Mot de passe', 'required']) !!}

                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('password_confirmation', 'Mot de passe de confirmation', ['class' => 'col-sm-4 col-form-label']) !!}

                <div class="col-sm-8">
                    {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => 'Mot de passe de confirmation', 'required']) !!}

                    @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group offset-sm-4">
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
