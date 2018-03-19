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
                </div>
                <div class="card-body"> 
                    <form method="POST" action="{{ route('discount.update') }}">
                    @csrf
                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Default form subscription -->
                            <form>
                                <input type="hidden" name="id" value="{{ $discount->id }}">
                                
                                <label for="defaultFormCardNameEx" class="font-weight-light">Type de remise</label>

                                <br>
                                <select name="typeDiscount" class="form-control">
                                    <option value="Don" @if ($discount->typeDiscount == 'Don bénévole') selected @endif >Don bénévole</option>
                                    <option value="Subvention" @if ($discount->typeDiscount == 'Subvention') selected @endif >Subvention</option>
                                </select>

                                <br>
                                <!-- Default input name -->
                                <label for="defaultFormCardNameEx" class="font-weight-light">Nom de la banque</label>
                                <input type="text" name="nameBank" class="form-control" value="{{ $discount->nameBank }}">
                                
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Nom de l'émetteur</label>
                                <input type="text" name="nameSender" class="form-control" value="{{ $discount->nameSender }}">
                                
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Date de la remise</label>
                                <input type="date" name="dateDiscount" class="form-control" value="{{ $discount->dateDiscount }}">
                                
                                <label for="defaultFormCardNameEx" class="font-weight-light">Montant de la remise</label>
                                <input type="text" name="priceDiscount" class="form-control" value="{{ $discount->priceDiscount }}">
                                

                                <label for="defaultFormCardNameEx" class="font-weight-light">Type de recette</label>
                                <br>
                                <select name="recipeType" class="form-control">
                                    <option value="Recette1"  @if ($discount->recipeType == 'Recette1') selected @endif >Recette1</option>
                                    <option value="Recette2"  @if ($discount->recipeType == 'Recette2') selected @endif >Recette2</option>
                                </select>
                                <br>
                                <label for="defaultFormCardNameEx" class="font-weight-light">Chat concerné</label>
                                <br>
                                <select name="cat" class="form-control">
                                    <option value="Chat1"  @if ($discount->cat == 'Chat1') selected @endif >Chat1</option>
                                    <option value="Chat2" @if ($discount->cat == 'Chat2') selected @endif >Chat2</option>
                                </select>
                                <br>

                                <label for="defaultFormCardNameEx" class="font-weight-light">Informations supplémentaires</label>
                                <textarea name="description" class="form-control" style="height:100px">{{ $discount->description }}</textarea>
                                


                                <div class="text-center py-4 mt-3">
                                    <button class="btn btn-primary"  type="submit">Modifier la remise<i class="fa fa-paper-plane-o ml-2"></i></button>
                                </div>
                            </form>
                            <!-- Default form subscription -->

                        </div>
                        <!-- Card body -->
                    </form>
                </div><!-- Card -->
            </div>
        </div>
    </div>
</div>
@endsection
