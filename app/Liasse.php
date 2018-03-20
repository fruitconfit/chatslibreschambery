<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Liasse extends Model
{
    public $timestamps = false;

    public static function getAllLiasses(){
        $liasses = DB::table('liasses')->get();
        $listLiasses = array();
        foreach($liasses as $liasse){
            $liasseTemp = Liasse::find($liasse->id);
            array_push($listLiasses, $liasseTemp);
        }
        return $listLiasses;
    }
    // Par Anaïs le 20/03/2018
    // Calcule le prix totale des remise d'une liasse
    public static function getAllDiscountByLiasseId($idLiasse){
        $discounts = DB::table('discounts')->where('id_liasse', $idLiasse)->get();
        $listDiscountByLiasseId = array();
        foreach($discounts as $discount){
            $discountTemp = Discount::find($discount->id);
            array_push($listDiscountByLiasseId, $discountTemp);
        }
        return $listDiscountByLiasseId;
    }
    // Par Anaïs le 20/03/2018
    // Calcule et renvoie le prix totale des remise d'une liasse
    public static function liasseTotalPrice($idLiasse){
        $discounts = Liasse::getAllDiscountByLiasseId($idLiasse);
        $total_price = 0;
        foreach($discounts as $discount){
            $total_price = $total_price + $discount->priceDiscount;
        }
        return $total_price;
    }
    // Par Anaïs le 20/03/2018
    // Calcule et renvoie le nombre de remise d'une liasse
    public static function liasseTotalDiscount($idLiasse){
        $discounts = Liasse::getAllDiscountByLiasseId($idLiasse);
        $nb_discount = 0;
        foreach($discounts as $discount){
            $nb_discount = $nb_discount + 1;
        }
        return $nb_discount;
    }
}
