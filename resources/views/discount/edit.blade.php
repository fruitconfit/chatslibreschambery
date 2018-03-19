@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Card --><div class="card mx-xl-5">
             
<form method="POST" action="{{ route('discount.update') }}">
@csrf
    <!-- Card body -->
    <div class="card-body">

        <!-- Default form subscription -->
        <form>
            <input type="hidden" name="id" value="{{ $discount->id }}">

            <p class="h4 text-center py-4">Modifier une remise</p>
            
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Type de remise</label>

            <br>
            <select name="typeDiscount" class="form-control">
                <option value="typeDiscount1" @if ($discount->typeDiscount == 'typeDiscount1') selected @endif >Don bénévole</option>
                <option value="typeDiscount2" @if ($discount->typeDiscount == 'typeDiscount2') selected @endif >Subvention</option>
           </select>

            <br>
            <!-- Default input name -->
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Nom de la banque</label>
            <input type="text" name="nameBank" class="form-control" value="{{ $discount->nameBank }}">
            
            <br>

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Nom de l'émetteur</label>
            <input type="text" name="nameSender" class="form-control" value="{{ $discount->nameSender }}">
            
            <br>

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Date de la remise</label>
            <input type="date" name="dateDiscount" class="form-control" value="{{ $discount->dateDiscount }}">
            
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Montant de la remise</label>
            <input type="text" name="priceDiscount" class="form-control" value="{{ $discount->priceDiscount }}">
            

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Type de recette</label>
            <br>
            <select name="recipeType" class="form-control">
                <option value="typeDiscount1"  @if ($discount->recipeType == 'typeDiscount1') selected @endif >Recette1</option>
                <option value="typeDiscount2"  @if ($discount->recipeType == 'typeDiscount2') selected @endif >Recette2</option>
           </select>
            <br>
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Chat concerné</label>
            <br>
            <select name="cat" class="form-control">
                <option value="typeDiscount1"  @if ($discount->cat == 'typeDiscount1') selected @endif >Chat1</option>
                <option value="typeDiscount2" @if ($discount->cat == 'typeDiscount2') selected @endif >Chat2</option>
           </select>
            <br>

             <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Informations supplémentaires</label>
            <textarea name="description" class="form-control" style="height:100px">{{ $discount->description }}</textarea>
            


            <div class="text-center py-4 mt-3">
                <button class="btn btn-outline-purple"  type="submit">Modifier la remise<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
        </form>
        <!-- Default form subscription -->

    </div>
    <!-- Card body -->
</form>
</div><!-- Card -->

@endsection
