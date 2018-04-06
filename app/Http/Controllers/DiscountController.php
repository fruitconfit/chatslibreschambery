<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use App\Http\Controllers\ComptaController;
use App\Discount;
use App\Liasse;

class DiscountController extends Controller
{

    public function create(Request $request,$id){
    	return view ('discount.create',['id_liasse' => $id]);
    }

    public function store(DiscountFormRequest $request){
    	$champs = [];
    	$champs["typeDiscount"]=$request->get("typeDiscount");
    	$champs["nameBank"]=$request->get("nameBank");
    	$champs["nameSender"]=$request->get("nameSender");
    	$champs["dateDiscount"]=$request->get("dateDiscount");
        $champs["priceDiscount"]=str_replace(',', '.', $request->get("priceDiscount")); // change les nombres à virgule en nombre décimaux valides
    	$champs["recipeType"]=$request->get("recipeType");
    	$champs["cat"]=$request->get("cat");
    	$champs["description"]=$request->get("description");
        $champs["id_liasse"]=$request->get("id_liasse");

    	Discount::create($request->except('_token'));

    	return redirect()->route('discount.create', $request->get('id_liasse'));
    }


    public function update(DiscountFormRequest $request) {
    	$discount = Discount::findOrFail($request->get('id'));
        $id_liasse = $discount->id_liasse;
    	
        $discount->typeDiscount = $request->get('typeDiscount');
        $discount->nameBank = $request->get("nameBank");
        $discount->nameSender = $request->get("nameSender");
        $discount->dateDiscount = $request->get("dateDiscount");
        $discount->priceDiscount = str_replace(',', '.', $request->get("priceDiscount"));
        $discount->recipeType = $request->get("recipeType");
        $discount->cat = $request->get("cat");
        $discount->description = $request->get("description");

        $discount->save();

        return redirect()->route('modifyLiasse', $id_liasse);
    }

    // Par Anaïs le 27/03/2018
    // Supprime la remise et update la vue
    public function deleteDiscount($id)
    {
        $discount = Discount::findOrFail($id);
        $id_liasse = $discount->id_liasse;
        Discount::destroy($id);
    	return redirect()->route('modifyLiasse', $id_liasse);
    }

}
