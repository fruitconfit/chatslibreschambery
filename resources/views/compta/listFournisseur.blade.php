@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Liste des fournisseurs
                </div>

                <div class="card-body">

                    <div class="container card-body">
                        <div class="form-group">Nombre de fournisseurs : {{ DB::table('fournisseurs')->count(DB::raw('DISTINCT id')) }}</div>

                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold ">
                                <tr>
                                    <th>Surnom</th>
                                    <th>Adresse</th>
                                    <th>Code postal</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Type de fournisseur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{ $fournisseur->nickname }}</td>
                                    <td>{{ $fournisseur->adress }}</td>
                                    <td>{{ $fournisseur->postcode }}</td>
                                    <td>{{ $fournisseur->email }}</td>
                                    <td>{{ $fournisseur->phone }}</td>
                                    <td>{{ $fournisseur->typefournisseur->nom }}</td>
                                    <td class="text-center"><a href="{{ route('modifyFournisseur',$fournisseur->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                    <td class="text-center d-none"><a href="{{ route('deleteFournisseur',['id'=>$fournisseur->id]) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <form action="{{ route('modifyFournisseur',0) }}">
                            <input type="submit" class="btn btn-primary" value="Ajouter un fournisseur" />
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection