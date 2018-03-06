<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
       protected $fillable = [
        'typeDiscount', 'nameBank', 'nameSender',
        'dateDiscount', 'priceDiscount', 'recipeType',
        'cat', 'description'
        
    ];
}
