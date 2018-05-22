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
                    <a class="float-right" href="{{ route('modifyLiasse',$id_liasse) }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="card-body"> 
                
                    <form method="POST" action="{{ route('discount.store') }}">
                    @csrf
                        <div class="card-body"> 
                            <input type="number" name="id_liasse" value="{{$id_liasse}}" class="d-none">

                            <label for="defaultFormCardNameEx" class="font-weight-light">Nom de l'émetteur (*)</label>
                            <input type="text" name="nameSender" class="form-control">
                            
                            <br>

                            <!-- adresse -->
                            <label for="adress" class="font-weight-light">Adresse (*)</label>
                            <input type="text" name="adress" class="form-control" required>

                            <br>

                            <!-- ville -->
                            <label for="city" class="font-weight-light">Ville (*)</label>
                            <input type="text" name="city" class="form-control" required>

                            <br>

                            <!-- code postal -->
                            <label for="postcode" class="font-weight-light">Code postal (*)</label>
                            <input type="text" name="postcode" class="form-control" required>

                            <br>

                            <label for="defaultFormCardNameEx" class="font-weight-light">Date de la remise (*)</label>
                            <input type="date" name="dateDiscount" value="{{date('Y-m-d')}}" class="form-control">

                            <br>

                            <label for="defaultFormCardNameEx" class="font-weight-light">Type de remise (*)</label>
                            <select name="typeDiscount" class="form-control" onchange="show(this.options[this.selectedIndex].value)">
                                <option value="Subvention" selected>Subvention</option>
                                <option value="Don" id="idDon">Don bénévole</option>
                                <option value="Autre">Autre</option>
                            </select>

                            <div id="hiddenDiv" style="display:none">
                                <label class="font-weight-light">Souhaite un reçu:</label>
                                {{ Form::checkbox('recu', 1, null, ['class' => 'checkbox-perm']) }}
                            </div>

                            <br>
                            
                            <label for="defaultFormCardNameEx" class="font-weight-light">Montant de la remise (*)</label>
                            <input type="number" step="0.01" name="priceDiscount" class="form-control">
                            
                            <br>
                            
                            <label for="defaultFormCardNameEx" class="font-weight-light">Type de recette (*)</label>
                            <select name="recipeType" class="form-control">
                                <option value="Chèque" selected>Chèque</option>
                                <option value="Espèces">Espèces</option>
                            </select>

                            <br>
                            
                            <label for="defaultFormCardNameEx" class="font-weight-light">Nom de la banque</label>
                            <input type="text" name="nameBank" class="form-control">
                            
                            <br>

                            <label for="defaultFormCardNameEx" class="font-weight-light">Chat concerné</label>
                            <select name="cat" class="form-control">
                                <option value="" selected></option>
                                <option value="Mistigri">Mistigri</option>
                                <option value="Felix">Felix</option>
                            </select>

                            <br>

                            <label for="defaultFormCardNameEx" class="font-weight-light">Informations supplémentaires</label>
                            <textarea name="description" class="form-control" style="height:100px"></textarea>
                            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Ajouter puis continuer</button>
                                </div>
                            </div>
                        <div class="form-group row col-md-12">Les champs signalés d'un (*) sont obligatoires.</div>
                        </div>
                    </form>
                </div><!-- Card -->
            </div>
        </div>
    </div>
</div>
@endsection
