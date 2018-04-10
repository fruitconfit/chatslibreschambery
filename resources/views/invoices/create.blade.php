@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Ajouter une facture
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
                        
                    <form method="POST" action="{{ route('invoices.store') }}">

                        @csrf

                        <div class="form-group row">
                            <label for="dateAjout" class="col-sm-2 col-form-label">Date d'ajout</label>
                            <div class="col-sm-10">
                                <input type="date" id="dateAjout" value="{{ date('Y-m-d') }}" name="date_ajout" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fournisseur" class="col-sm-2 col-form-label">Fournisseur</label>
                            <div class="col-sm-10">
                                <select id="fournisseur" name="provider_id" class="form-control" required>
                                    <option value="">-</option>
                                    @foreach($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->nickname }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('modifyFournisseur',0) }}" class="btn btn-info btn-md">Nouveau fournisseur</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numFacture" class="col-sm-2 col-form-label">Numéro de facture</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="numFacture" name="numero_facture" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateFacture" class="col-sm-2 col-form-label">Date de la facture</label>
                            <div class="col-sm-10">
                                <input type="date" id="dateFacture" name="date_facture" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="montant" class="col-sm-2 col-form-label">Montant € TTC</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="montant" name="montant" step="any" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateReglement" class="col-sm-2 col-form-label">Date de règlement</label>
                            <div class="col-sm-10">
                                <input type="date" id="dateReglement" name="date_reglement" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="commentaire" class="col-sm-2 col-form-label">Commentaire</label>
                            <div class="col-sm-10">
                                <textarea class="form-control rounded-0" id="commentaire" name="commentaire"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-md">Créer facture</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                      
@endsection