@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Modifier la remise
                    <a class="float-right" href="{{ route('modifyLiasse',$discount->id_liasse) }}">Retour à la liasse <i class="fa fa-chevron-right"></i></a>
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

                    <form method="POST" action="{{ route('discount.update') }}">
                        @csrf
                        <!-- Card body -->
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $discount->id }}">

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Nom de l'émetteur (*)</label>
                                <input type="text" name="nameSender" class="form-control" value="{{ $discount->nameSender }}">
                            </div>

                            <div class="form-group">
                                <label for="adress" class="col-form-label">Adresse (*)</label>
                                <input type="text" name="adress" value="{{$discount->adress}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-form-label">Ville (*)</label>
                                <input type="text" name="city" value="{{$discount->city}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="postcode" class="col-form-label">Code postal (*)</label>
                                <input type="text" name="postcode" value="{{$discount->postcode}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Date de la remise (*)</label>
                                <input type="date" name="dateDiscount" class="form-control" value="{{ $discount->dateDiscount }}">
                            </div>
                                
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Type de remise (*)</label>
                                <br>
                                <select name="typeDiscount" class="form-control" onchange="show(this.options[this.selectedIndex].value)">
                                    <option value="Subvention" @if ($discount->typeDiscount == 'Subvention') selected @endif >Subvention</option>
                                    <option value="Don" id="idDon" @if ($discount->typeDiscount == 'Don') selected @endif >Don bénévole</option>
                                    <option value="Autre" @if ($discount->typeDiscount == 'Autre') selected @endif >Autre</option>
                                </select>
                                
                                <div id="hiddenDiv" @if ($discount->typeDiscount != 'Don') style="display:none" @endif>
                                    <label class="col-form-label">Souhaite un reçu:</label>
                                    @if ($discount->recu == 1) 
                                        {{ Form::checkbox('recu', 1, 1, ['class' => 'checkbox-perm']) }}
                                    @else
                                        {{ Form::checkbox('recu', 1, null, ['class' => 'checkbox-perm']) }}
                                    @endif
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Montant de la remise (*)</label>
                                <input type="number" step="0.01" name="priceDiscount" class="form-control" value="{{ $discount->priceDiscount }}">
                            </div>

                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Type de recette (*)</label>
                                <select name="recipeType" class="form-control">
                                    <option value="Chèque"  @if ($discount->recipeType == 'Chèque') selected @endif >Chèque</option>
                                    <option value="Espèces"  @if ($discount->recipeType == 'Espèces') selected @endif >Espèces</option>
                                </select>
                            </div>
                                
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Nom de la banque</label>
                                <input type="text" name="nameBank" class="form-control" value="{{ $discount->nameBank }}">
                            </div>
 
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Chat concerné</label>
                                <input type="text" name="cat" value="{{$discount->cat}}" class="form-control">
                            </div>
 
                            <div class="form-group">
                                <label for="defaultFormCardNameEx" class="col-form-label">Informations supplémentaires</label>
                                <textarea name="description" class="form-control rounded-0" style="height:100px">{{ $discount->description }}</textarea>
                            </div>
                            <div class="form-group">Les champs signalés d'un (*) sont obligatoires.</div>
                            <div class="text-center">
                                <button class="btn btn-primary"  type="submit">Modifier la remise</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
