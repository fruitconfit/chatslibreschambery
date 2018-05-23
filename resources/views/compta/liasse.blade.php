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
                    <a class="float-right" href="{{ route('manageLiasse') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyLiasse',$liasse->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="creationDate" class="col-form-label">Créée le (*)</label>
                                @if ($liasse->id > 0)
                                    <input id="creationDate" type="date" value="{{$liasse->creationDate}}" name="creationDate" required>
                                @else
                                    <input id="creationDate" type="date" value="{{date('Y-m-d')}}" name="creationDate" required>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="transmission" class="col-form-label">Transmise le</label>
                                <input id="transmission" type="date" value="@if ($liasse->transmission != NULL){{$liasse->transmission}}@endif" name="transmission">
                            </div>
                            
                            <div class="form-group">
                                <label for="creditate" class="col-form-label">Créditée le</label>
                                <input id="creditate" type="date" value="@if ($liasse->creditate != NULL){{$liasse->creditate}}@endif" name="creditate">
                            </div>
                            <div class="form-group">Les champs signalés d'un (*) sont obligatoires.</div>

                            <div class="text-center">
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

                    <div class="container">
                        <div class="form-group">Nombre de remises dans cette liasse : {{ $nb_discount }}</div>
                        <div class="form-group">Total : {{ $total_price }} €</div>
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

                    <form action="{{ route('discount.create',$liasse->id) }}">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Ajouter" />
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <br>
        </div>
    </div>
</div>
@endsection