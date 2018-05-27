@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Ajouter un type de fournisseur
                    <a class="float-right" href="{{ route('manageTypeFournisseur') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeTypeFournisseur') }}">
                        @csrf
                        <div class="card-body container"> 
                            <div class="form-group">
                                <label for="nom" class="col-form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter le type fournisseur</button>
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