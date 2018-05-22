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
                    Modifier une remise
                    <a class="float-right" href="{{ route('modifyLiasse',$discount->id_liasse) }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="card-body"> 
                    <form method="POST" action="{{ route('discount.update') }}">
                    @csrf
                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Default form subscription -->
                            <form>
                                <input type="hidden" name="id" value="{{ $discount->id }}">

                                <label for="defaultFormCardNameEx" class="font-weight-light">Nom de l'émetteur (*)</label>
                                <input type="text" name="nameSender" class="form-control" value="{{ $discount->nameSender }}">

                                <br>

                                <!-- adresse -->
                                <label for="adress" class="font-weight-light">Adresse (*)</label>
                                <input type="text" name="adress" value="{{$discount->adress}}" class="form-control" required>

                                <br>

                                <!-- ville -->
                                <label for="city" class="font-weight-light">Ville (*)</label>
                                <input type="text" name="city" value="{{$discount->city}}" class="form-control" required>

                                <br>

                                <!-- code postal -->
                                <label for="postcode" class="font-weight-light">Code postal (*)</label>
                                <input type="text" name="postcode" value="{{$discount->postcode}}" class="form-control" required>

                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Date de la remise (*)</label>
                                <input type="date" name="dateDiscount" class="form-control" value="{{ $discount->dateDiscount }}">

                                <br>
                                
                                <label for="defaultFormCardNameEx" class="font-weight-light">Type de remise (*)</label>
                                <br>
                                <select name="typeDiscount" class="form-control" onchange="show(this.options[this.selectedIndex].value)">
                                    <option value="Subvention" @if ($discount->typeDiscount == 'Subvention') selected @endif >Subvention</option>
                                    <option value="Don" id="idDon" @if ($discount->typeDiscount == 'Don') selected @endif >Don bénévole</option>
                                    <option value="Autre" @if ($discount->typeDiscount == 'Autre') selected @endif >Autre</option>
                                </select>
                                
                                <div id="hiddenDiv" @if ($discount->typeDiscount != 'Don') style="display:none" @endif>
                                    <label class="font-weight-light">Souhaite un reçu:</label>
                                    @if ($discount->recu == 1) 
                                        {{ Form::checkbox('recu', 1, 1, ['class' => 'checkbox-perm']) }}
                                    @else
                                        {{ Form::checkbox('recu', 1, null, ['class' => 'checkbox-perm']) }}
                                    @endif
                                </div>
                                

                                <br>
                                
                                <label for="defaultFormCardNameEx" class="font-weight-light">Montant de la remise (*)</label>
                                <input type="number" step="0.01" name="priceDiscount" class="form-control" value="{{ $discount->priceDiscount }}">
                                
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Type de recette (*)</label>
                                <br>
                                <select name="recipeType" class="form-control">
                                    <option value="Chèque"  @if ($discount->recipeType == 'Chèque') selected @endif >Chèque</option>
                                    <option value="Espèces"  @if ($discount->recipeType == 'Espèces') selected @endif >Espèces</option>
                                </select>

                                <br>
                                
                                <label for="defaultFormCardNameEx" class="font-weight-light">Nom de la banque</label>
                                <input type="text" name="nameBank" class="form-control" value="{{ $discount->nameBank }}">
                                
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Chat concerné</label>
                                <br>
                                <input type="text" name="cat" value="{{$discount->cat}}" class="form-control">
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Informations supplémentaires</label>
                                <textarea name="description" class="form-control" style="height:100px">{{ $discount->description }}</textarea>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-primary"  type="submit">Modifier la remise</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Default form subscription -->
                        <div class="form-group row col-md-12">Les champs signalés d'un (*) sont obligatoires.</div>

                        </div>
                        <!-- Card body -->
                    </form>
                </div><!-- Card -->
            </div>
        </div>
    </div>
</div>
@endsection
