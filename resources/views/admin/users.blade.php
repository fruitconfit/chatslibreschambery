@extends('layouts.app')

@section('content')
<ul>
@foreach($users as $user)
<li>{{ $user->name }}&nbsp;<a href="{{ route('deleteUser',['id'=>$user->id]) }}">Supprimer</a></li>
@endforeach
</ul>
@endsection
