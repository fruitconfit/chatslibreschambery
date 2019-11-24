@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Gestion des reçus fiscaux</div>

                <div class="card-body">
                    <div class="container card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold">
                                <tr>
                                    <th>Liasse</th>
                                    <th>Emetteur</th>
                                    <th>Adresse</th>
                                    <th>Faite le</th>
                                    <th>Montant</th>
                                    <th>Recette</th>
                                    <th>Banque</th>
                                    <th>Reçu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dons as $don)
                                    <tr>
                                        <th>{{ $don->id_liasse }}</th>
                                        <td>{{ $don->nameSender }}</td>
                                        <td>{{ $don->adress }} {{ $don->city }} {{ $don->postcode }}</td>
                                        <td>{{ $don->dateDiscount }}</td>
                                        <td>{{ $don->priceDiscount }}€</td>
                                        <td>{{ $don->recipeType }}</td>
                                        <td>{{ $don->nameBank }}</td>
                                        <td class="text-center">
                                            @if($don->recu == 1)
                                                <a href="{{ url('recu/'.$don->id.'/print') }}" target="_blank" class="waves-effect"><i class="fa fa-download"></i></a>
                                            @else
                                                Non
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection