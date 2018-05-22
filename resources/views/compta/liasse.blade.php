@extends('layouts.app')

@section('content')
<div class="d-none">

</div>
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
                    <a class="float-right" href="{{ route('manageLiasse') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyLiasse',$liasse->id) }}">
                        @csrf
                        <!-- date de création -->
                        <div class="form-group row">
                            <label for="creationDate" class="col-md-4 col-form-label text-md-right">Créée le (*)</label>
                            <div class="col-md-6">
                                @if ($liasse->id > 0)
                                <input id="creationDate" type="date" value="{{$liasse->creationDate}}" name="creationDate" required>
                                @else
                                <input id="creationDate" type="date" value="{{date('Y-m-d')}}" name="creationDate" required>
                                @endif
                            </div>
                        </div>

                        <!-- date de transmission -->
                        <div class="form-group row">
                            <label for="transmission" class="col-md-4 col-form-label text-md-right">Transmise le</label>

                            <div class="col-md-6">
                                <input id="transmission" type="date" value="@if ($liasse->transmission != NULL){{$liasse->transmission}}@endif" name="transmission">
                            </div>
                        </div>
                        
                        <!-- date de créditation -->
                        <div class="form-group row">
                            <label for="creditate" class="col-md-4 col-form-label text-md-right">Créditée le</label>

                            <div class="col-md-6">
                                <input id="creditate" type="date" value="@if ($liasse->creditate != NULL){{$liasse->creditate}}@endif" name="creditate">
                            </div>
                        </div>
                        <div class="form-group row col-md-12">Les champs signalés d'un (*) sont obligatoires.</div>

                        <!-- valider le formulaire -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            @if ($liasse->id > 0)
            <div class="card card-default">
                <div class="card-header">Gérer les remises de la liasse</div>

                <div class="card-body">
                    <div class="form-group row col-md-12">Nombre de remises dans cette liasse : {{ $nb_discount }}</div>
                    <div class="form-group row col-md-12">Total : {{ $total_price }} €</div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="font-weight-bold">
                                        <tr>
                                            <th>Ref</th>
                                            <th>Emetteur</th>
                                            <th>Faite le</th>
                                            <th>Type de remise</th>
                                            <th>Montant</th>
                                            <th>Recette</th>
                                            <th>Banque</th>
                                            <th>Chat concerné</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($discounts as $discount)
                                            <tr>
                                                <td>{{ $discount->id }}</td>
                                                <td>{{ $discount->nameSender }}</td>
                                                <td>{{ $discount->dateDiscount }}</td>
                                                <td>{{ $discount->typeDiscount }}</td>
                                                <td>{{ $discount->priceDiscount }}€</td>
                                                <td>{{ $discount->recipeType }}</td>
                                                <td>{{ $discount->nameBank }}</td>
                                                <td>{{ $discount->cat }}</td>
                                                <td class="text-center"><a href="{{ url('discount/edit/'.$discount->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                                <td class="text-center"><a href="{{ route('discount.deleteDiscount',['id'=>$discount->id]) }}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('discount.create',$liasse->id) }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Ajouter" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<br>
@endsection