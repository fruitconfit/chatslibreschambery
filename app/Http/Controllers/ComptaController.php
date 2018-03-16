<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use Illuminate\Support\Facades\DB;
use App\Liasse;
use App\Discount;

class ComptaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compta.liasse');
    }

    public function modifyLiasse(Request $request, $id)
    {
        $message = '';
        $liasse = Liasse::find($id);
        if ($liasse != NULL){
            //modification de la liasse
            if ( $request->input('creationDate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
            }
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
            }
            $liasse->save();
            $liasse = Liasse::find($id);
            $message = 'La liasse a bien été modifiée.';
        } elseif ($request->input('creationDate') != NULL) {
            //on ajoute la liasse
            $liasse = new Liasse();
            if ( $request->input('creationDate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
            }
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
            }
            $liasse->save();
            $liasse = Liasse::find($liasse->id);
            $message = 'La liasse a bien été ajoutée.';
        } else {
            //affichage de la page standard
            $liasse = new Liasse();
            $liasse->id = 0;
        }
        return view('compta.liasse',['liasse'=>$liasse,'discounts'=>$this->getAllDiscounts(),'message'=>$message]);
    }

    public function manageLiasse(Request $request)
    {
        return view('compta.listLiasse',['liasses'=>$this->getAllLiasses()]);
    }

    private function getAllLiasses(){
        $liasses = DB::table('liasses')->get();
        $listLiasses = array();
        foreach($liasses as $liasse){
            $liasseTemp = Liasse::find($liasse->id);
            array_push($listLiasses, $liasseTemp);
        }
        return $listLiasses;
    }

    private function getAllDiscounts(){
        $discounts = DB::table('discounts')->get();
        $listDiscounts = array();
        foreach($discounts as $discount){
            $discountTemp = Discount::find($discount->id);
            array_push($listDiscounts, $discountTemp);
        }
        return $listDiscounts;
    }
}