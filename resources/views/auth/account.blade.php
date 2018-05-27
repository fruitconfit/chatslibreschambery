@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Modifier mes informations</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('accountModify') }}">
                        @csrf
                        <div class="card-body">
                            @if($message != "")
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$message}}
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Address email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">Nouveau mot de passe</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label">Confirmer le mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" value="Submit">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
