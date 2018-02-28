@extends('layouts.app')

@section('content')
<ul>
@foreach($users as $user)
<li>{{ $user->name }}
    <ul>
        @foreach($user->getRoleNames() as $role)
            <li>{{ $role }}</li>
        @endforeach
    </ul>

<form method="GET" action="{{ route('addRoleToUser',$user->id) }}">
    @csrf
    <div class="form-group row">
        {{ Form::select('nameAdd', $roles, null) }}
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" value="Submit">
                Ajouter ce role
            </button>
        </div>
    </div>
</form>
<form method="GET" action="{{ route('deleteRoleToUser',$user->id) }}">
    @csrf
    <div class="form-group row">
        {{ Form::select('nameDelete', $roles, null) }}
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" value="Submit">
                Supprimer ce role
            </button>
        </div>
    </div>
</form>
</br><a href="{{ route('deleteUser',['id'=>$user->id]) }}">Supprimer</a></li>
@endforeach
</ul>
@endsection
