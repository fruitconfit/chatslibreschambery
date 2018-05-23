@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Gérer les utilisateurs</div>
                <div class="card-body">
                    @foreach($users as $user)

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="font-weight-bold">
                                        <tr>
                                            <th>
                                                {{ $user->name }} <a  href="{{ route('renameUser', $user->id) }}"><i class="fa fa-edit"></i></a>
                                                @if ($user->email !== Auth::user()->email)
                                                <span  class="float-right">
                                                    
                                                    <a onclick="displayCheckDelete('{{ route('deleteUser',$user->id) }}','{{ $user->name }}')">(Supprimer l'utilisateur)</a>
                                                </span>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->getRoleNames() as $role)
                                        <tr>
                                            <td>{{ $role }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm">
                                <form method="GET" action="{{ route('addRoleToUser',$user->id) }}">
                                @csrf
                                    <div class="form-group row">
                                        {{ Form::select('nameAdd', $roles, null) }}
                                            <button type="submit" class="btn btn-primary" value="Submit">
                                                Ajouter ce role
                                            </button>
                                    </div>
                                </form>
                                <form method="GET" action="{{ route('deleteRoleToUser',$user->id) }}">
                                    @csrf
                                    <div class="form-group row">
                                        {{ Form::select('nameDelete', $roles, null) }}
                                            <button type="submit" class="btn btn-primary" value="Submit">
                                                Supprimer ce role
                                            </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
