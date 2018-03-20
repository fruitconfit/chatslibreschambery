@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                @if ($liasse->id == 0)
                    Ajouter une liasse
                @elseif ($liasse->id > 0)
                    Modifier la liasse
                @endif
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyLiasse',$liasse->id) }}">
                        @csrf
                        <!-- date de création -->
                        <div class="form-group row">
                            <label for="creationDate" class="col-md-4 col-form-label text-md-right">Créée le (*) </label>
                            <div class="col-md-6">
                                <input id="creationDate" type="date" value="@if ($liasse->creationDate != NULL){{$liasse->creationDate}} @endif" name="creationDate" required>
                            </div>
                        </div>

                        <!-- date de transmission -->
                        <div class="form-group row">
                            <label for="transmission" class="col-md-4 col-form-label text-md-right">Transmise le  </label>

                            <div class="col-md-6">
                                <input id="transmission" type="date" value="@if ($liasse->transmission != NULL){{$liasse->transmission}}@endif" name="transmission">
                            </div>
                        </div>
                        
                        <!-- date de créditation -->
                        <div class="form-group row">
                            <label for="creditate" class="col-md-4 col-form-label text-md-right">Créditée le </label>

                            <div class="col-md-6">
                                <input id="creditate" type="date" value="@if ($liasse->creditate != NULL){{$liasse->creditate}}@endif" name="creditate">
                            </div>
                        </div>
                        <div class="form-group row col-md-12">Les champs signalés d'un (*) sont obligatoires.</div>

                        <!-- valider le formulaire -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                                <button type="impress" class="btn btn-primary" value="Impress">Imprimer #</button>
                                <div class="col-md-12">{{$message}}</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">Gérer les remises de la liasse</div>

                <div class="card-body">
                    <div class="form-group row col-md-12">Nombre de remises dans cette liasse : {{ DB::table('discounts')->count(DB::raw('DISTINCT id')) }}</div>
                    <div class="form-group row col-md-12">Total : {{ DB::table('discounts')->sum(DB::raw('DISTINCT priceDiscount')) }} €</div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="font-weight-bold">
                                        <tr>
                                            <th>Ref</th>
                                            <th>Type de remise</th>
                                            <th>Banque</th>
                                            <th>Emetteur</th>
                                            <th>Date de la remise</th>
                                            <th>Montant</th>
                                            <th>Type de recette</th>
                                            <th>Chat concerné</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($discounts as $discount)
                                        <tr>
                                            <td>{{ $discount->id }}</td>
                                            <td>{{ $discount->typeDiscount }}</td>
                                            <td>{{ $discount->nameBank }}</td>
                                            <td>{{ $discount->nameSender }}</td>
                                            <td>{{ $discount->dateDiscount }}</td>
                                            <td>{{ $discount->priceDiscount }}</td>
                                            <td>{{ $discount->recipeType }}</td>
                                            <td>{{ $discount->cat }}</td>
                                            <td class="text-center"><a href="{{ url('discount/edit/'.$discount->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($liasse->id > 0)
                        <form action="{{ route('discount.create') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Ajouter une remise" />
                                </div>
                            </div>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection