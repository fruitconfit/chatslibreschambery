<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Discount extends Model
{
       protected $fillable = [
        'typeDiscount', 
        'nameBank', 
        'nameSender',
        'dateDiscount', 
        'priceDiscount', 
        'recipeType',
        'cat', 
        'description', 
        'id_liasse'
    ];
    
    public static function getAllDiscounts(){
        $discounts = DB::table('discounts')->get();
        $listDiscounts = array();
        foreach($discounts as $discount){
            $discountTemp = Discount::find($discount->id);
            array_push($listDiscounts, $discountTemp);
        }
        return $listDiscounts;
    }
}
