@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                @if ($discount->id == 0)
                    Ajouter une remise
                @elseif ($discount->id > 0)
                    Modifier la remise
                @endif
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyLiasse',$liasse->id) }}">
                        @csrf
                        <!-- date de création -->
                        <div class="form-group row">
                            <select name="typeDiscount" class="form-control">
                                <option value="typeDiscount" selected>Don bénévole</option>
                                <option value="typeDiscount">Subvention</option>
                            </select>
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