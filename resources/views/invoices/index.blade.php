@extends('layouts.app')

@section('content')

<div class="row">
  <a class="btn peach-gradient btn-rounded btn-lg btn-block" href="{{ route('invoices.create') }}">Ajouter</a>
</div>

<hr>

<h3>Liste des factures</h3>

<table class="table" id="table_factures">
  <thead class="thead-light">
    <tr>
      <th scope="col"></th>
      <th scope="col">Date d'ajout</th>
      <th scope="col">Fournisseur</th>
      <th scope="col">n° de facture</th>
      <th scope="col">Date de la facture</th>
      <th scope="col">Montant € TTC</th>
      <th scope="col">Payée</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($invoices as $invoice)
    <tr>
      <td><a href="{{ url('/invoices/'.$invoice->id.'/edit') }}"> <i class="fa fa-edit"></i></a></td>
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
    </tr>
    @endforeach
  </tbody>
</table>

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