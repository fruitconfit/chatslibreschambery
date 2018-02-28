@extends('layouts.app')

@section('content')
<ul>
@foreach($roles as $role)
<li>{{ $role->name }}&nbsp;<a href="{{ route('manageGroups') }}">Permission</a>&nbsp;<a href="{{ route('deleteRole',['id'=>$role->id]) }}">Supprimer</a></li>
@endforeach
</ul>
@endsection
