@extends('layouts.app')

@section('content')
<div class="d-none">

</div>
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
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('modifyFournisseur',$fournisseur->id) }}">
                        <div class="card-body"> 
                            <!-- nom raccourci -->
                            <label for="nickname" class="font-weight-light">Nom raccourci</label>
                            <input type="text" name="nickname" value="@if ($fournisseur->nickname != NULL){{$fournisseur->nickname}}@endif" class="form-control" required>

                            <br>

                            <!-- nom -->
                            <label for="name" class="font-weight-light">Nom du fournisseur</label>
                            <input type="text" name="name" value="@if ($fournisseur->name != NULL){{$fournisseur->name}}@endif" class="form-control" required>

                            <br>

                            <!-- adresse -->
                            <label for="adress" class="font-weight-light">Adresse</label>
                            <input type="text" name="adress" value="@if ($fournisseur->adress != NULL){{$fournisseur->adress}}@endif" class="form-control" required>

                            <br>

                            <!-- code postal -->
                            <label for="postcode" class="font-weight-light">Code postal</label>
                            <input type="text" name="postcode" value="@if ($fournisseur->postcode != NULL){{$fournisseur->postcode}}@endif" class="form-control" required>

                            <br>

                            <!-- ville -->
                            <label for="city" class="font-weight-light">Ville</label>
                            <input type="text" name="city" value="@if ($fournisseur->city != NULL){{$fournisseur->city}}@endif" class="form-control" required>

                            <br>

                            <!-- email -->
                            <label for="email" class="font-weight-light">Adresse mail</label>
                            <input type="email" name="email" value="@if ($fournisseur->email != NULL){{$fournisseur->email}}@endif" class="form-control" required>

                            <br>
                            
                            <!-- tel -->
                            <label for="phone" class="font-weight-light">Numéro de téléphone</label>
                            <input type="tel" name="phone" value="@if ($fournisseur->phone != NULL){{$fournisseur->phone}}@endif" class="form-control" required>

                            <br>
                            
                            <!-- type de fournisseur -->
                            <label for="type" class="font-weight-light">Type de fournisseur</label>
                            <select name="type" class="form-control">
                                <option value="Vétérinaire" @if ($fournisseur->type == 'Vétérinaire' || $fournisseur == NULL) selected @endif>Vétérinaire</option>
                                <option value="Fournisseur de nourriture" @if ($fournisseur->type == 'Fournisseur de nourriture') selected @endif>Fournisseur de nourriture</option>
                            </select>

                            <br>
                            
                            <!-- commentaire -->
                            <label for="comment" class="font-weight-light">Commentaire</label>
                            <textarea name="comment" class="form-control" style="height:100px" required>@if ($fournisseur->comment != NULL){{$fournisseur->comment}}@endif</textarea>

                            <!-- valider le formulaire -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                                </div>
                            </div>
                            <div class="col-md-12">{{$message}}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection