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
                        <div class="card-body"> 
                            
                            <label for="nom" class="font-weight-light">Nom</label>
                            <input type="text" name="nom" id="nom" required>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection