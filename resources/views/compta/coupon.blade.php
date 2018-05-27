@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card card-default">
        <div class="card-header">
          @if ($coupon->id == 0)
              Ajouter un coupon
          @elseif ($coupon->id > 0)
              Modifier le coupon
          @endif
          <a class="float-right" href="{{ route('manageCoupon') }}">Retour <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="card-body">
          <form method="GET" action="{{route('modifyCoupon', $coupon->id)}}">
            @csrf
            <div class="card-body">
              @if($message != "")
              <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{$message}}
              </div>
              @endif
              
              <!-- nom referent de l'association -->
              <div class="form-group">
                <label for="referentName" class="col-form-label">Référent d'association à contacter en cas de doute (*)</label>
                <input type="text" name="referentName" value="@if ($coupon->referentName != NULL){{$coupon->referentName}} @else Elodie Daulon @endif" class="form-control" required>
              </div>

              <!-- num referent de l'association -->
              <div class="form-group">
                <label for="referentPhone" class="col-form-label">Téléphone du référent (*)</label>
                <input type="tel" name="referentPhone" value="@if ($coupon->referentPhone != NULL){{$coupon->referentPhone}} @else 0620440525 @endif" class="form-control" required>
              </div>

              <!-- nom benevole de l'association -->
              <div class="form-group">
                <label for="benevoleName" class="col-form-label">Bénévole de l'association (*)</label>
                <input type="text" name="benevoleName" value="@if ($coupon->benevoleName != NULL){{$coupon->benevoleName}} @endif" class="form-control" required>
              </div>

              <!-- num benevole de l'association -->
              <div class="form-group">
                <label for="benevolePhone" class="col-form-label">Téléphone du bénévole (*)</label>
                <input type="tel" name="benevolePhone" value="@if ($coupon->benevolePhone != NULL){{$coupon->benevolePhone}} @endif" class="form-control" required>
              </div>

              <!--date expiration-->
              <div class="form-group">
                <label for="dateExpiration" class="col-form-label">Date d'expiration du coupon (*)</label>
                <input type="date" name="dateExpiration" value="{{date('Y-m-d', mktime(0,0,0,12,31,date('y')))}}" class="form-control" required>
              </div>

              <!--commentaire-->
              <div class="form-group">
                <label for="commentaire" class="col-form-label">Commentaire</label>
                <textarea name="commentaire" class="form-control" style="height:100px" class="from-control">@if($coupon->commentaire !=NULL){{$coupon->commentaire}}@endif</textarea>
              </div>

              <!-- valider le formulaire -->
              <div class="text-center">
                <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
              </div>
          <div class="form-group row col-md-12">Les champs signalés d'un (*) sont obligatoires.</div>
          </form>
        </div><!-- Card -->
      </div>
      <br>
    </div>
  </div>
</div>
@endsection
