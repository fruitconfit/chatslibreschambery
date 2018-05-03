<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coupon extends Model
{
  public $timestamps=false;
  public static function getAllCoupons(){
      $coupons = DB::table('coupons')->get();
      $listCoupons = array();
      foreach($coupons as $coupon){
          $couponTemp = Coupon::find($coupon->id);
          array_push($listCoupons, $couponTemp);
      }
      return $listCoupons;
  }
}
