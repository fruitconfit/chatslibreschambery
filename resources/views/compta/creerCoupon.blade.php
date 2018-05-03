@extends('layouts.app')

@section('content')
<div class "container">
  <div class= "row justify-content-center">
    <div class= "col-md-10">
      <div class="card card-default">
        <div class="card-header">
          Creer un coupon
        </div>
        <div class="card-body">
          <form method="GET" action="{{route('createCoupon', $coupon->id)}}">
            <div class="card-body">
              <!-- nom referent de l'association -->
              <label for="referentName" class="font-weight-light">Référent d'association à contacter en cas de doute</label>
              <input type="text" name="referentName" value="@if ($coupon->referentName != NULL){{$coupon->referentName}}@endif" class="from-control" required>
              <br>

              <!-- num referent de l'association -->
              <label for="referentPhone" class="font-weight-light">Numéro du référent</label>
              <input type="tel" name="referentPhone" value="@if ($coupon->referentPhone != NULL){{$coupon->referentPhone}}@endif" class="from-control" required>
              <br>

              <!-- nom benevole de l'association -->
              <label for="benevoleName" class="font-weight-light">Bénévole de l'association</label>
              <input type="text" name="benevoleName" value="@if ($coupon->benevoleName != NULL){{$coupon->benevoleName}}@endif" class="from-control" required>
              <br>

              <!-- num benevole de l'association -->
              <label for="benevoleNamePhone" class="font-weight-light">Numéro du bénévole</label>
              <input type="tel" name="benevolePhone" value="@if ($coupon->benevolePhone != NULL){{$coupon->benevolePhone}}@endif" class="from-control" required>
              <br>

              <!--date expiration-->
              <label for="dateExpiration" class="font-weight-light">Date d'expiration du coupon</label>
              <input type="date" name="dateExpiration" value="@if($coupon->dateExpiration !=NULL){{$coupon->dateExpiration}}@endif" class="from-control" required>
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
