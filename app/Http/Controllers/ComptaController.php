<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use Illuminate\Support\Facades\DB;
use App\Liasse;
use App\Discount;
use App\Fournisseur;

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

    /* --------------------------------------------------- LIASSES --------------------------------------------------- */

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

    // Par Anaïs le 27/03/2018
    // Supprime la liasse et update la vue
    public function deleteLiasse($id)
    {
        Liasse::destroy($id);
        return view('compta.listLiasse',['liasses'=>Liasse::getAllLiasses()]);
    }

/* --------------------------------------------------- FOURNISSEURS --------------------------------------------------- */

    // Par Anaïs le 20/03/2018
    // Retrouve le fournisseur par son id (s'il' existe)
    //  L'ajoute s'il n'existe pas et que les champs ne sont pas remplis
    //  Le modifie si des champs ont été remplis ou modifiés
    //  Sinon on affiche la page d'ajout d'un nouveau fournisseur
    public function modifyFournisseur(Request $request, $id)
    {
        $message = '';
        $fournisseur = Fournisseur::find($id);
        

        // Modification de le fournisseur
        if ($fournisseur != NULL){
            if ( $request->input('nickname') != NULL){
                $fournisseur->nickname = $request->input('nickname');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('name') != NULL){
                $fournisseur->name = $request->input('name');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('adress') != NULL){
                $fournisseur->adress = $request->input('adress');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('postcode') != NULL){
                $fournisseur->postcode = $request->input('postcode');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('city') != NULL){
                $fournisseur->city = $request->input('city');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('email') != NULL){
                $fournisseur->email = $request->input('email');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('phone') != NULL){
                $fournisseur->phone = $request->input('phone');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('type') != NULL){
                $fournisseur->type = $request->input('type');
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('comment') != NULL){
                $fournisseur->comment = $request->input('comment');
                $message = 'Le fournisseur a bien été modifié.';
            }
            $fournisseur->save();
            $fournisseur = Fournisseur::find($id);

        // Ajout de le fournisseur
        } elseif ($request->input('nickname') != NULL) {
            $fournisseur = new Fournisseur();
            if ( $request->input('nickname') != NULL){
                $fournisseur->nickname = $request->input('nickname');
            }
            if ($request->input('name') != NULL){
                $fournisseur->name = $request->input('name');
            }
            if ($request->input('adress') != NULL){
                $fournisseur->adress = $request->input('adress');
            }
            if ($request->input('postcode') != NULL){
                $fournisseur->postcode = $request->input('postcode');
            }
            if ($request->input('city') != NULL){
                $fournisseur->city = $request->input('city');
            }
            if ($request->input('email') != NULL){
                $fournisseur->email = $request->input('email');
            }
            if ($request->input('phone') != NULL){
                $fournisseur->phone = $request->input('phone');
            }
            if ($request->input('type') != NULL){
                $fournisseur->type = $request->input('type');
            }
            if ($request->input('comment') != NULL){
                $fournisseur->comment = $request->input('comment');
            }
            $fournisseur->save();
            $fournisseur = Fournisseur::find($fournisseur->id);
            $message = 'Le fournisseur a bien été ajouté.';
            return view('compta.listFournisseur',['fournisseurs'=>Fournisseur::getAllFournisseur()]);
            
        // Affiche la page de création de fournisseur
        } else {
            $fournisseur = new Fournisseur();
            $fournisseur->id = 0;
        }
        return view('compta.fournisseur',
            ['fournisseur'=>$fournisseur,
            'message'=>$message]);
    }

    // Par Anaïs le 20/03/2018
    // Affiche la liste de tous les fournisseurs
    public function manageFournisseur(Request $request)
    {
        return view('compta.listFournisseur',['fournisseurs'=>Fournisseur::getAllFournisseur()]);
    }

    // Par Anaïs le 27/03/2018
    // Supprime le fournisseur et update la vue
    public function deleteFournisseur($id)
    {
        Fournisseur::destroy($id);
        return view('compta.listFournisseur',['fournisseurs'=>Fournisseur::getAllFournisseur()]);
    }

    /* --------------------------------------------------- DONS --------------------------------------------------- */

    // Par Anaïs le 27/03/2018
    // Affiche la liste de tous les dons
    public function manageDons(Request $request)
    {
        return view('compta.listDon',['dons'=>Discount::getAllDons()]);
    }
}