@extends('layouts.app')

@section('content')

<!-- Card --><div class="card mx-xl-5">
             
<form method="POST" action="{{ route('discount.store') }}">
@csrf
    <!-- Card body -->
    <div class="card-body">

        <!-- Default form subscription -->
        <form>
            <p class="h4 text-center py-4">Ajout des remises</p>
            
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Type de remise</label>

            <br>
            <select name="typeDiscount" class="form-control">
                <option value="typeDiscount1" selected>Don bénévol</option>
                <option value="typeDiscount2">Subvention</option>
           </select>

            <br>
            <!-- Default input name -->
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Nom de la banque</label>
            <input type="text" name="nameBank" class="form-control">
            
            <br>

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Nom de l'émetteur</label>
            <input type="text" name="nameSender" class="form-control">
            
            <br>

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Date de la remise</label>
            <input type="date" name="dateDiscount" class="form-control">
            
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Montant de la remise</label>
            <input type="text" name="priceDiscount" class="form-control">
            

            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Type de recette</label>
            <br>
            <select name="recipeType" class="form-control">
                <option value="typeDiscount1" selected>Recette1</option>
                <option value="typeDiscount2">Recette2</option>
           </select>
            <br>
            <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Chat concerné</label>
            <br>
            <select name="cat" class="form-control">
                <option value="typeDiscount1" selected>Chat1</option>
                <option value="typeDiscount2">Chat2</option>
           </select>
            <br>

             <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Informations supplémentaires</label>
            <textarea name="description" class="form-control" style="height:100px"></textarea>
            


            <div class="text-center py-4 mt-3">
                <button class="btn btn-outline-purple"  type="submit">Ajouter la remise<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
        </form>
        <!-- Default form subscription -->

    </div>
    <!-- Card body -->
</form>
</div><!-- Card -->

@endsection
