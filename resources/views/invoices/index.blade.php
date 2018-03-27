@if (isset($_GET['from']) && !empty($_GET['from']))
  <?php $invoices = $invoices->where('date_facture', '>=', $_GET['from']); ?>
@endif

@if (isset($_GET['to']) && !empty($_GET['to']))
  <?php $invoices = $invoices->where('date_facture', '<=', $_GET['to']); ?>
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
                  Lister les factures
                </div>
                <div class="card-body">

                  <table class="table" id="table_factures">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Date d'ajout</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">n° de facture</th>
                        <th scope="col">Date de la facture</th>
                        <th scope="col">Montant € TTC</th>
                        <th scope="col">Payée</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($invoices as $invoice)
                      <tr>
                        <td>{{ date('d/m/Y', strtotime($invoice->date_ajout)) }}</td>
                        <td>{{ $invoice->provider_id }}</td>
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
                        <td><a href="{{ url('/invoices/'.$invoice->id.'/edit') }}"> <i class="fa fa-edit"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                    <a class="btn peach-gradient btn-rounded" href="{{ route('invoices.create') }}">Ajouter</a>
                  </div>

                  <h4>Filtrer</h4>

                  <form method="GET" action="{{ route('invoices.index') }}">
                    <div class="form-group row">
                      <label for="from" class="col-sm-2 col-form-label">Date entre</label>
                      <div class="col-sm-10">
                        <input type="date" id="from" name="from" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="to" class="col-sm-2 col-form-label">et</label>
                      <div class="col-sm-10">
                        <input type="date" id="to" name="to" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                          <div class="col-sm-10">
                              <select name="providerType" class="form-control">
                                <option value="">Par type de fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->type }}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>

                      <div class="form-group row">
                          <div class="col-sm-10">
                              <select name="provider" class="form-control">
                                <option value="">Par fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->nickname }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <select name="paid" class="form-control">
                          <option value="">Par statut (payée ou non)</option>
                          <option value="true">Payée</option>
                          <option value="false">Non payée</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-md">Filtrer</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

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