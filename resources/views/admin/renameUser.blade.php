@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Renommer l'utilisateur {{ $user->name }}
                    <a class="float-right" href="{{ route('users') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('renameUser',$user->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom</label>
                                <input id="name" type="text" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" value="Submit">Modifier</button>
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
            <br>
        </div>
    </div>
</div>
@endsection
