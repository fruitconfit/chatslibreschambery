@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">
                Ajout des remises
                </div>
                <div class="card-body"> 
                    <form method="POST" action="{{ route('discount.store') }}">
                    @csrf
                    <input type="number" name="id_liasse" value="{{$id_liasse}}" class="d-none">

                        <label for="defaultFormCardNameEx" class="font-weight-light">Type de remise</label>

                        <br>
                        <select name="typeDiscount" class="form-control">
                            <option value="Don" selected>Don bénévole</option>
                            <option value="Subvention">Subvention</option>
                    </select>
                        <br>
                        <!-- Default input name -->
                        <label for="defaultFormCardNameEx" class="font-weight-light">Nom de la banque</label>
                        <input type="text" name="nameBank" class="form-control">
                        
                        <br>

                        <label for="defaultFormCardNameEx" class="font-weight-light">Nom de l'émetteur</label>
                        <input type="text" name="nameSender" class="form-control">
                        
                        <br>

                        <label for="defaultFormCardNameEx" class="font-weight-light">Date de la remise</label>
                        <input type="date" name="dateDiscount" class="form-control">
                        
                        <br>
                        
                        <label for="defaultFormCardNameEx" class="font-weight-light">Montant de la remise</label>
                        <input type="text" name="priceDiscount" class="form-control">
                        

                        <label for="defaultFormCardNameEx" class="font-weight-light">Type de recette</label>
                        <br>
                        <select name="recipeType" class="form-control">
                            <option value="Recette1" selected>Recette1</option>
                            <option value="Recette2">Recette2</option>
                    </select>
                        <br>
                        <label for="defaultFormCardNameEx" class="font-weight-light">Chat concerné</label>
                        <br>
                        <select name="cat" class="form-control">
                            <option value="Chat1" selected>Chat1</option>
                            <option value="Chat2">Chat2</option>
                    </select>
                        <br>
                        <label for="defaultFormCardNameEx" class="font-weight-light">Informations supplémentaires</label>
                        <textarea name="description" class="form-control" style="height:100px"></textarea>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">Ajouter la remise</button>
                            </div>
                        </div
                    </form>
                </div><!-- Card -->
            </div>
        </div>
    </div>
</div>
@endsection
