@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Ajouter des rôles
                    <a class="float-right" href="{{ route('groups') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('addRole') }}">
                        @csrf
                        <div class="card-body"> 
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom du role</label>
                                <input id="name" type="text" class="form-controlc{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" value="Submit">Ajouter et continuer</button>
                            </div>
                            @if($message != "")
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$message}}
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
