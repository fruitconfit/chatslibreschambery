@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Liste des coupons</div>

                <div class="card-body">
                    <div class="card-body container">
                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold">
                                <tr>
                                    <th>N° de coupon</th>
                                    <th>Nom du référent</th>
                                    <th>Téléphone du référent</th>
                                    <th>Nom du bénévole</th>
                                    <th>Téléphone du bénévole</th>
                                    <th>Expire le</th>
                                    <th>Commentaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->refCoupon }}</td>
                                    <td>{{ $coupon->referentName }}</td>
                                    <td>{{ $coupon->referentPhone }}</td>
                                    <td>{{ $coupon->benevoleName }}</td>
                                    <td>{{ $coupon->benevolePhone }}</td>
                                    <td>{{ $coupon->dateExpiration }}</td>
                                    <td>{{ $coupon->commentaire }}</td>
                                    <!--
                                    <td> <a href="{{ url('recu/'.$coupon->refCoupon.'/print') }}" target="_blank" class="waves-effect"><i class="fa fa-download"></i></a> </td>
                                    -->
                                    <td class="text-center"><a href="{{ route('modifyCoupon',$coupon->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                    <td class="text-center"><a href="{{ route('deleteCoupon',['id'=>$coupon->id]) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <form action="{{ route('modifyCoupon',0) }}">
                            <input type="submit" class="btn btn-primary" value="Ajouter un coupon" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
