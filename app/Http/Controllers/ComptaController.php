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

    // Par Anaïs le ...
    // Retrouve la liasse par son id (si elle existe)
    //  L'ajoute si elle n'existe pas et que les champs ne sont pas remplis
    //  La modifie si des champs ont été remplis ou modifiés
    //  Sinon on affiche la page d'ajout d'une nouvelle liasse
    public function modifyLiasse(Request $request, $id)
    {
        $message = '';
        $liasse = Liasse::find($id);

        // Modification de la liasse
        if ($liasse != NULL){
            if ( $request->input('creationDate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
                $message = 'La liasse a bien été modifiée.';
            }
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
                $message = 'La liasse a bien été modifiée.';
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
                $message = 'La liasse a bien été modifiée.';
            }
            $liasse->save();
            $liasse = Liasse::find($id);

        // Ajout de la liasse
        } elseif ($request->input('creationDate') != NULL) {
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
            
        // Affiche la page de création de liasse
        } else {
            $liasse = new Liasse();
            $liasse->id = 0;
        }
        return view('compta.liasse',
            ['liasse'=>$liasse,
            'discounts'=>Liasse::getAllDiscountByLiasseId($liasse->id),
            'total_price'=>Liasse::liasseTotalPrice($liasse->id),
            'nb_discount'=>Liasse::liasseTotalDiscount($liasse->id),
            'message'=>$message]);
    }

    // Par Anaïs le ...
    // Affiche la liste de toutes les liasses
    public function manageLiasse(Request $request)
    {
        return view('compta.listLiasse',['liasses'=>Liasse::getAllLiasses()]);
    }

}