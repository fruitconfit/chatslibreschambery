@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Gérer les rôles</div>
                <div class="card-body col-md-6">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Rôle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td class="col-md-2"><a href="{{ route('manageGroups') }}">Permission</a></td>
                                <td class="col-md-2"><a href="{{ route('deleteRole',['id'=>$role->id]) }}">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
