@extends('layout.app')

@selection('content')
<div class = "container">
  <div class = "row justify-content-center">
    <div class = "col-md-10">
      <div class = "card card-default">
        @if ($errors->any())
        <div class = "alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="card-header">
          Création de factures
        </div>
        <div class = "card-body">
          <form method="POST" action="{{ route('facture.create')}}">
            @csrf

              <label for="defaultFormFactureName" class = "font-weight-light">Date d'ajout</label>
              <input type="date" name="dateAjoutF" class = "formFacture">
              <!--date d'ajout de la facture (le jour même)-->

              <br>

              <!-- à faire : sélection du fournisseur, ddemander aide-->

              <br>

              <label for="defaultFormFactureName" class = "font-weight-light">Numéro de la facture</label>
              <input type="text" name="numeroF" class="formFacture">
              <!-- numéro de la facture donné par le fournisseur-->

              <br>

              <label for="defaultFormFactureName" class = "font-weight-light">Date de la facture</label>
              <input type="date" name = "dateEmissionF" class = "formFacture">
              <!--date d'émission de la facture par le fournisseur-->

              <br>

              <label for ="defaultFormFactureName" class = "font-weight-light">Montant € TTC</label>
              <input type="text" name ="montant" class = "formFacture">
              <!--montant de la facture-->

              <br>

              <label for ="defaultFormFactureName" class = "font-weight-light">Date de règlement</label>
              <input type = "date" name = "datepaiementF" class "formFacture">
              <!--date de paiement par l'association-->
              <br>

              <label for="defaultFormFactureName" class = "font-weight-light">Commentaire</label>
              <textarea name="description" class="formFacture" style="height:100px"></textarea>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
