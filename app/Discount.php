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
        'recu', 
        'edite', 
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
    
    public static function getAllDons(){
        $discounts = DB::table('discounts')->get();
        $listDiscounts = array();
        foreach($discounts as $discount){
            if($discount->typeDiscount == 'Don'){
                $discountTemp = Discount::find($discount->id);
                array_push($listDiscounts, $discountTemp);
            }
        }
        return $listDiscounts;
    }
    
}
