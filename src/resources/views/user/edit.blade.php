@extends('user.layouts', ['tab' => 'profile'])

@section('main_content')
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
    <div class="card">
        <div class="card-body">
            <h1>Profile</h1>
            <hr class="my-4">

            {!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'files' => true]) !!}

            <div class="row">
                <div class="col-md-8">

                    <div class="form-group row">
                        {!! Form::label('name', 'name', ['class' => 'col-sm-2 col-form-label']) !!}

                        <div class="col-sm-12">

                            <input type="text" name="name" class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" placeholder="{{__('users.placeholder.name')}}" required value="{{ $user->name }}">

                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('email', 'email', ['class' => 'col-sm-2 col-form-label']) !!}

                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control {{ ($errors->has('email') ? ' is-invalid' : '') }}" placeholder="{{__('users.placeholder.email')}}" required value="{{ $user->email }}">

                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('city', 'Ville', ['class' => 'col-sm-2 col-form-label']) !!}

                        <div class="col-sm-12">
                            {!! Form::text('city', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ville', 'required']) !!}

                            @error('city')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('name', 'Rue', ['class' => 'col-sm-2 col-form-label']) !!}

                        <div class="col-sm-12">
                            {!! Form::text('street', null, ['class' => 'form-control' . ($errors->has('street') ? ' is-invalid' : ''), 'placeholder' => 'Rue', 'required']) !!}

                            @error('street')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('country', 'Pays', ['class' => 'col-sm-2 col-form-label']) !!}

                        <div class="col-sm-12">
                            {!! Form::text('country', null, ['class' => 'form-control' . ($errors->has('country') ? ' is-invalid' : ''), 'placeholder' => 'Pays', 'required']) !!}

                            @error('country')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('birthday', 'Date de naissance', ['class' => 'col-sm-12 col-form-label']) !!}

                        <div class="col-sm-12">
                        {!! Form::date('birthday', !is_null($user->profile) ? \Carbon\Carbon::parse($user->profile->birthday) : \Carbon\Carbon::now(), ['class' => 'form-control' . ($errors->has('birthday') ? ' is-invalid' : ''), 'placeholder' => 'birthday', 'required']); !!}
                        @error('birthday')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('phone', 'Telephone', ['class' => 'col-sm-12 col-form-label']) !!}
                        <div class="col-sm-12">
                            <input type="text" name="phone" class="form-control {{ ($errors->has('phone') ? ' is-invalid' : '') }}" required value="{{ !is_null($user->profile) ? $user->profile->phone : '' }}">
                        </div>

                        @error('birthday')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-center">
                        <div class="profile-header-container">
                            <div class="profile-header-img mb-2">
                                <img class="rounded-circle" width="100px" height="100px" src="{{ asset($user->avatar) }}" />
                            </div>
                            <div class="form-group row">
                                {!! Form::file('avatar', ['accept' => 'image/*', 'class' => 'profile-user-avatar-uploads' . ($errors->has('avatar') ? ' is-invalid' : '')]) !!}

                                @error('avatar')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Enregistrer', ['class' => 'btn text-white btn-recherche']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
