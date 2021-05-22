@extends('user.layouts', ['tab' => 'user'])

@section('main_content')

    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
    <div class="card">
        <div class="card-body">
            <h1>Invitation : )</h1>
            <hr class="my-4">

            {!! Form::model(['method' => 'POST', 'route' => ['users.invitation']]) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        {!! Form::label('email', 'Nom de votre ami', ['class' => 'col-sm-12 col-form-label']) !!}

                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" placeholder="Name" required value="">

                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('email', 'Email de votre ami', ['class' => 'col-sm-12 col-form-label']) !!}

                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control {{ ($errors->has('email') ? ' is-invalid' : '') }}" placeholder="Email" required value="">

                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Envoyer', ['class' => 'btn text-white btn-recherche']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
