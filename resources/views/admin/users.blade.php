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
            <button type="submit" value="Submit">
                Ajouter ce role
            </button>
    </div>
</form>
<form method="GET" action="{{ route('deleteRoleToUser',$user->id) }}">
    @csrf
    <div class="form-group row">
        {{ Form::select('nameDelete', $roles, null) }}
            <button type="submit" value="Submit">
                Supprimer ce role
            </button>
    </div>
</form>
@if ($user->email !== Auth::user()->email)
    </br><a href="{{ route('deleteUser',['id'=>$user->id]) }}">Supprimer</a></li>
@endif
@endforeach
</ul>
@endsection
