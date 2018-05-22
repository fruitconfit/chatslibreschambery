@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Gérer les permissions
                    <a class="float-right" href="{{ route('groups') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('manageRole',$roleId) }}">
                        @csrf

                        @foreach($permissionGroup as $permission)
                            @if (in_array($permission, $permissions)) 
                                {{ Form::checkbox('checkList[]', $permission, true, ['class' => 'checkbox-perm']) }}
                            @else
                               {{ Form::checkbox('checkList[]', $permission, null, ['class' => 'checkbox-perm']) }}
                            @endif
                            {{ $permission }}<br>
                        @endforeach
                        <!-- valider le formulaire -->
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                            <div class="col-md-12 @if($message != "") alert alert-success @endif">{{$message}}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection