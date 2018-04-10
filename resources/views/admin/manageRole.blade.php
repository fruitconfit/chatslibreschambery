@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">

                <div class="card-body">
                    <form method="GET" action="{{ route('manageRole',$roleId) }}">
                        @csrf

                        @foreach($allPermissions as $permission)
                            @if (in_array($permission->name, $permissions)) 
                                {{ Form::checkbox('checkList[]', $permission->name, true, ['class' => 'checkbox-perm']) }}
                            @else
                               {{ Form::checkbox('checkList[]', $permission->name, null, ['class' => 'checkbox-perm']) }}
                            @endif
                            {{ $permission->name }}<br>
                        @endforeach
                        <!-- valider le formulaire -->
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                            <div class="col-md-12">{{$message}}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection