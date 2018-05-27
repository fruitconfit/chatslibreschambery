@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    @if ($fournisseur->id == 0)
                        Ajouter un fournisseur
                    @elseif ($fournisseur->id > 0)
                        Modifier le fournisseur
                    @endif
                    <a class="float-right" href="{{ route('manageFournisseur') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyFournisseur',$fournisseur->id) }}">
                        <div class="card-body"> 
                            @if($message != "")
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$message}}
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="nickname" class="col-form-label" maxlength="16">Nom raccourci (*)</label>
                                <input type="text" maxlength="16" name="nickname" value="@if ($fournisseur->nickname != NULL){{$fournisseur->nickname}}@endif" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom du fournisseur (*)</label>
                                <input type="text" name="name" value="@if ($fournisseur->name != NULL){{$fournisseur->name}}@endif" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="adress" class="col-form-label">Adresse (*)</label>
                                <input type="text" name="adress" value="@if ($fournisseur->adress != NULL){{$fournisseur->adress}}@endif" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-form-label">Ville (*)</label>
                                <input type="text" name="city" value="@if ($fournisseur->city != NULL){{$fournisseur->city}}@endif" class="form-control" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="postcode" class="col-form-label">Code postal (*)</label>
                                <input type="text" name="postcode" value="@if ($fournisseur->postcode != NULL){{$fournisseur->postcode}}@endif" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Adresse mail (*)</label>
                                <input type="email" name="email" value="@if ($fournisseur->email != NULL){{$fournisseur->email}}@endif" class="form-control" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Numéro de téléphone (*)</label>
                                <input type="tel" name="phone" value="@if ($fournisseur->phone != NULL){{$fournisseur->phone}}@endif" class="form-control" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="type" class="col-form-label">Type de fournisseur (*)</label>
                                <select name="type" class="form-control">
                                    @foreach ($typesfournisseurs as $typefournisseur)
                                        <option value="{{ $typefournisseur->id }}">{{ $typefournisseur->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                                
                            <div class="form-group">
                                <label for="comment" class="col-form-label">Commentaire</label>
                                <textarea name="comment" class="form-control" style="height:100px">@if ($fournisseur->comment != NULL){{$fournisseur->comment}}@endif</textarea>
                            </div>

                            <div class="form-group">Les champs signalés d'un (*) sont obligatoires.</div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" value="Submit">Ajouter le fournisseur</button>
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