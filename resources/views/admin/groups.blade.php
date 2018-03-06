@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<form method="GET" action="{{ url('/discount/') }}"">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Nom du role</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" value="Submit">
                Ajouter un role
            </button>
        </div>
    </div>
</form>
=======
>>>>>>> b2bba27c74d91ea9c3f865c520465c2c78de90b9
<ul>
@foreach($roles as $role)
<li>{{ $role->name }}&nbsp;<a href="{{ route('manageGroups') }}">Permission</a>&nbsp;<a href="{{ route('deleteRole',['id'=>$role->id]) }}">Supprimer</a></li>
@endforeach
</ul>
@endsection
