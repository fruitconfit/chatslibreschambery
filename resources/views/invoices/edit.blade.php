@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Modification de la facture
                    <a class="float-right" href="{{ route('invoices.index') }}">Retour <i class="fa fa-chevron-right"></i></a>
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
                    
                    <form method="POST" class="float-right" action="{{ url('/invoices/'.$invoice->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette facture ?');">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" id="deleteBtn">Supprimer la facture</button>
                    </form>

                    <form method="POST" action="{{ url('/invoices/'.$invoice->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dateAjout" class="col-form-label">Date d'ajout (*)</label>
                                <input type="date" id="dateAjout" value="{{ $invoice->date_ajout }}" name="date_ajout" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="fournisseur" class="col-form-label">Fournisseur (*)</label>
                                <select id="fournisseur" name="fournisseur_id" class="form-control" required>
                                    <option value="">-</option>
                                    @foreach($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}" @if ($invoice->fournisseur_id == $fournisseur->id) selected @endif>{{ $fournisseur->nickname }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('modifyFournisseur',0) }}" class="btn btn-info btn-md">Nouveau fournisseur</a>
                            </div>

                            <div class="form-group">
                                <label for="numFacture" class="col-form-label">Numéro de facture (*)</label>
                                <input type="text" class="form-control" id="numFacture" name="numero_facture" value="{{ $invoice->numero_facture }}" required>
                            </div>

                            <div class="form-group">
                                <label for="dateFacture" class="col-form-label">Date de la facture (*)</label>
                                <input type="date" id="dateFacture" name="date_facture" class="form-control" value="{{ $invoice->date_facture }}" required>
                            </div>

                            <div class="form-group">
                                <label for="montant" class="col-form-label">Montant € TTC (*)</label>
                                <input type="number" class="form-control" id="montant" name="montant" step="any" value="{{ $invoice->montant }}" required>
                            </div>

                            <div class="form-group">
                                <label for="dateReglement" class="col-form-label">Date de règlement</label>
                                <input type="date" id="dateReglement" name="date_reglement" class="form-control" value="{{ $invoice->date_reglement }}">
                            </div>

                            <div class="form-group">
                                <label for="commentaire" class="col-form-label">Commentaire</label>
                                <textarea class="form-control rounded-0" id="commentaire" name="commentaire">{{ $invoice->commentaire }}</textarea>
                            </div>
                            <div class="form-group">Les champs signalés d'un (*) sont obligatoires.</div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modifier la facture</button>
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