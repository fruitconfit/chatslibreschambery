@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Ajouter une liasse</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('manageLiasse',$liasse->id) }}">
                        @csrf
                        <!-- date de création -->
                        <div class="form-group row">
                            <label for="creationDate" class="col-md-4 col-form-label text-md-right">Créée le (*) </label>
                            <div class="col-md-6">
                                <input id="creationDate" type="date" value="@if ($liasse->creationDate != NULL){{$liasse->creationDate}}@endif" name="creationDate" required>
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
                            <label for="submit" class="col-md-4 col-form-label text-md-right">Liste de remise </label>
                            
                            <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                            <!-- <button type="impress" class="btn btn-primary" value="Impress">Imprimer</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection