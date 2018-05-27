@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">

                <div class="card-header">Gérer les rôles</div>

                <div class="card-body">
                    <div class="card-body col-md-6 offset-md-3">
                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold">
                                <tr>
                                    <th>Rôle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td class="col-md-2"><a href="{{ route('manageRole',['id'=>$role->id]) }}">Permission</a></td>
                                    <td class="col-md-2 text-center"><a href="{{ route('deleteRole',['id'=>$role->id]) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <form action="{{ route('addRole') }}">
                            <input type="submit" class="btn btn-primary" value="Ajouter un role" />
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
