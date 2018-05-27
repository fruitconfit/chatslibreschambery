@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Liste des liasses</div>

                <div class="card-body">

                    <div class="container card-body">
                        <div class="form-group">Nombre de liasses : {{ DB::table('liasses')->count(DB::raw('DISTINCT id')) }}</div>

                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold ">
                                <tr>
                                    <th>Ref de la liasse</th>
                                    <th>Crée le</th>
                                    <th>Transmise le</th>
                                    <th>Créditée le</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($liasses as $liasse)
                                <tr>
                                    <td>{{ $liasse->id }}</td>
                                    <td>{{ $liasse->creationDate }}</td>
                                    <td>{{ $liasse->transmission }}</td>
                                    <td>{{ $liasse->creditate }}</td>
                                    <td class="text-center"><a href="{{ route('modifyLiasse',$liasse->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                    <td class="d-none text-center"><a href="{{ route('deleteLiasse',['id'=>$liasse->id]) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <form action="{{ route('modifyLiasse',0) }}">
                            <input type="submit" class="btn btn-primary" value="Ajouter une liasse" />
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection