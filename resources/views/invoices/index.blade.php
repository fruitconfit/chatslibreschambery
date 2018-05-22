@if (isset($_GET['from']) && !empty($_GET['from']))
  <?php $invoices = $invoices->where('date_facture', '>=', $_GET['from']); ?>
@endif

@if (isset($_GET['to']) && !empty($_GET['to']))
  <?php $invoices = $invoices->where('date_facture', '<=', $_GET['to']); ?>
@endif

@if (isset($_GET['providerType']) && !empty($_GET['providerType']))
  
@endif

@if (isset($_GET['provider']) && !empty($_GET['provider']))
  <?php $invoices = $invoices->where('fournisseur_id', $_GET['provider']); ?>
@endif

@if (isset($_GET['paid']) && !empty($_GET['paid']))
  @if ($_GET['paid'] == 'true')
    <?php $invoices = $invoices->where('date_reglement', '!=', NULL); ?>
  @endif

  @if ($_GET['paid'] == 'false')
    <?php $invoices = $invoices->where('date_reglement', NULL); ?>
  @endif
@endif

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                  Liste des factures
                </div>
                <div class="card-body">

                  <table class="table" id="table_factures">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Ajoutée le</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">n° de facture</th>
                        <th scope="col">Date de la facture</th>
                        <th scope="col">Montant € TTC</th>
                        <th scope="col">Payée</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($invoices as $invoice)
                      <tr @if (is_null($invoice->date_reglement))  class="table-danger" @else class="table-success" @endif>
                        <td>{{ date('d/m/Y', strtotime($invoice->date_ajout)) }}</td>
                        <td>{{ $invoice->fournisseur->nickname }}</td>
                        <td>{{ $invoice->numero_facture }}</td>
                        <td>{{ date('d/m/Y', strtotime($invoice->date_facture)) }}</td>
                        <td>{{ $invoice->montant }}</td>
                        <td>
                          @if (is_null($invoice->date_reglement))
                            -
                          @else
                            {{ date('d/m/Y', strtotime($invoice->date_reglement)) }}
                          @endif
                        </td>
                        <td>{{ $invoice->commentaire }}</td>
                        <td><a href="{{ url('/invoices/'.$invoice->id.'/edit') }}"> <i class="fa fa-edit"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                    <a class="btn btn-primary" href="{{ route('invoices.create') }}">Ajouter</a>
                  </div>
                </div>
              </div>

              <br>

              <div class="card card-default">
                <div class="card-header">
                  Filtrer
                </div>
                <div class="card-body">

                  <form method="GET" action="{{ route('invoices.index') }}">
                    <div class="form-group row">
                      <label for="from" class="col-form-label">Date comprise entre</label>
                      <input class="col-sm-3" type="date" id="from" name="from" class="form-control">
                      <label for="to" class="col-form-label">et</label>
                      <input class="col-sm-3" type="date" id="to" name="to" class="form-control">
                    </div>

                    <!--<div class="form-group row">
                          <div class="col-sm-10">
                              <select name="providerType" class="form-control">
                                <option value="">Par type de fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->type }}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>-->

                      <div class="form-group row">
                          <div class="col-sm-5">
                              <select name="provider" class="form-control">
                                <option value="">Par fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->nickname }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>

                    <div class="form-group row">
                      <div class="col-sm-5">
                        <select name="paid" class="form-control">
                          <option value="">Par statut (payée ou non)</option>
                          <option value="true">Payée</option>
                          <option value="false">Non payée</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
    	$('#table_factures').DataTable({
    		language: {
    			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json',
          buttons: {
            copy: 'Copier',
            excel: 'Export Excel',
            csv: 'Export CSV',
            print: 'Imprimer'
          }
    		},
        dom: 'B<"clear">lfrtip'
    	});
	});
</script>
@endsection