<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use App\Discount;

class DiscountController extends Controller
{
    //

    public function create(){
    	return view ('discount.create');
    }

//issou
    public function store(DiscountFormRequest $request){
    	$champs = [];
    	$champs["typeDiscount"]=$request->get("typeDiscount");
    	$champs["nameBank"]=$request->get("nameBank");
    	$champs["nameSender"]=$request->get("nameSender");
    	$champs["dateDiscount"]=$request->get("dateDiscount");
    	$champs["priceDiscount"]=$request->get("priceDiscount");
    	$champs["recipeType"]=$request->get("recipeType");
    	$champs["cat"]=$request->get("cat");
    	$champs["description"]=$request->get("description");

    	Discount::create($request->except('_token'));

    	return redirect()->route('discount.create');
    }


    public function update(DiscountFormRequest $request) {
    	$discount = Discount::findOrFail($request->get('id'));
    	
        $discount->typeDiscount = $request->get('typeDiscount');
        $discount->nameBank = $request->get("nameBank");
        $discount->nameSender = $request->get("nameSender");
        $discount->dateDiscount = $request->get("dateDiscount");
        $discount->priceDiscount = $request->get("priceDiscount");
        $discount->recipeType = $request->get("recipeType");
        $discount->cat = $request->get("cat");
        $discount->description = $request->get("description");

        $discount->save();

        return redirect()->route('manageLiasse');
    }

}
