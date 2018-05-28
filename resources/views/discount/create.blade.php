@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Ajouter des remises
                    <a class="float-right" href="{{ route('modifyLiasse',$id_liasse) }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="card-body"> 
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('discount.store') }}">
                    @csrf
                        <div class="card-body"> 
                            <input type="number" name="id_liasse" value="{{$id_liasse}}" class="d-none">

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Nom de l'émetteur (*)</label>
                                <input type="text" name="nameSender" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="adress" class="col-form-label">Adresse (*)</label>
                                <input type="text" name="adress" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-form-label">Ville (*)</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="postcode" class="col-form-label">Code postal (*)</label>
                                <input type="number" name="postcode" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Date de la remise (*)</label>
                                <input type="date" name="dateDiscount" value="{{date('Y-m-d')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Type de remise (*)</label>
                                <select name="typeDiscount" class="form-control" onchange="show(this.options[this.selectedIndex].value)">
                                    <option value="Subvention" selected>Subvention</option>
                                    <option value="Don" id="idDon">Don bénévole</option>
                                    <option value="Autre">Autre</option>
                                </select>

                                <div id="hiddenDiv" style="display:none">
                                    <label class="col-form-label">Souhaite un reçu:</label>
                                    {{ Form::checkbox('recu', 1, null, ['class' => 'checkbox-perm']) }}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Montant de la remise (*)</label>
                                <input type="number" step="0.01" name="priceDiscount" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Type de recette (*)</label>
                                <select name="recipeType" class="form-control">
                                    <option value="Chèque" selected>Chèque</option>
                                    <option value="Espèces">Espèces</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Nom de la banque</label>
                                <input type="text" name="nameBank" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Chat concerné</label>
                                <input type="text" name="cat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Informations supplémentaires</label>
                                <textarea name="description" class="form-control rounded-0" style="height:100px"></textarea>
                            </div>
                            
                            <div class="form-group">Les champs signalés d'un (*) sont obligatoires.</div>

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Ajouter puis continuer</button>
                            </div>
                        </div>
                    </form>
                </div><!-- Card -->
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
