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
}
