@extends('layouts.app')

@section('content')

<h1>Modification de la facture</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
<form method="POST" action="{{ url('/invoices/'.$invoice->id) }}">

	@csrf

    {{ method_field('PUT') }}

	<div class="form-group row">
        <label for="dateAjout" class="col-sm-2 col-form-label">Date d'ajout</label>
        <div class="col-sm-10">
            <input type="date" id="dateAjout" value="{{ $invoice->date_ajout }}" name="date_ajout" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="fournisseur" class="col-sm-2 col-form-label">Fournisseur</label>
        <div class="col-sm-10">
            <select id="fournisseur" name="provider_id" class="form-control" required>
            	<option value="">-</option>
            	<option value="1">Issou</option>
            	<option value="2">Risitas</option>
            </select>
            <a href="#" class="btn btn-info btn-md">Nouveau fournisseur</a>
        </div>
    </div>

    <div class="form-group row">
        <label for="numFacture" class="col-sm-2 col-form-label">Numéro de facture</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="numFacture" name="numero_facture" value="{{ $invoice->numero_facture }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="dateFacture" class="col-sm-2 col-form-label">Date de la facture</label>
        <div class="col-sm-10">
            <input type="date" id="dateFacture" name="date_facture" class="form-control" value="{{ $invoice->date_facture }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="montant" class="col-sm-2 col-form-label">Montant € TTC</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="montant" name="montant" step="any" value="{{ $invoice->montant }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="dateReglement" class="col-sm-2 col-form-label">Date de règlement</label>
        <div class="col-sm-10">
            <input type="date" id="dateReglement" name="date_reglement" class="form-control" value="{{ $invoice->date_reglement }}">
        </div>
    </div>

    <div class="form-group row">
	    <label for="commentaire" class="col-sm-2 col-form-label">Commentaire</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control rounded-0" id="commentaire" name="commentaire">{{ $invoice->commentaire }}</textarea>
	    </div>
	</div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary btn-md">Modifier la facture</button>
        </div>
    </div>
 
</form>

<form method="POST" action="{{ url('/invoices/'.$invoice->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette facture ?');">
    @csrf

    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger btn-md" id="deleteBtn">Supprimer la facture</button>
</form>
                      
@endsection