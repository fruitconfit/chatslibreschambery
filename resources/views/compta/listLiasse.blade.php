@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Liste des liasses</div>

                <div class="card-body">
                    <div class="form-group row col-md-12">Nombre de liasses : {{ DB::table('liasses')->count(DB::raw('DISTINCT id')) }}</div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID de la liasse</th>
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
                                            <td><a href="{{ route('modifyLiasse',$liasse->id) }}" class="waves-effect">Modifier</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('modifyLiasse',0) }}">
                        <input type="submit" class="btn btn-primary" value="Ajouter une liasse" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection