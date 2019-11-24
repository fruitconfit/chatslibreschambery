<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use Illuminate\Support\Facades\DB;
use App\Liasse;
use App\Discount;
use App\Fournisseur;
use App\TypeFournisseur;
use App\Trace;

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
        if ($liasse != NULL && $request != NULL){
            $befLiasse = clone $liasse;
            if ( $request->input('creationDate') != NULL || $request->input('transmission') != NULL || $request->input('creditate') != NULL){
                $liasse->creationDate = $request->input('creationDate');
                $liasse->transmission = $request->input('transmission');
                $liasse->creditate = $request->input('creditate');
                $message = 'La liasse a bien été modifiée.';
                $liasse->save();
                Trace::traceUpdate('Liasse', $request, $befLiasse);
            }
            
            $liasse = Liasse::find($id);

        // Ajout de la liasse
        } elseif ($request->input('creationDate') != NULL) {
            $liasse = new Liasse();
            $liasse->creationDate = $request->input('creationDate');
            if ($request->input('transmission') != NULL){
                $liasse->transmission = $request->input('transmission');
            }
            if ($request->input('creditate') != NULL){
                $liasse->creditate = $request->input('creditate');
            }
            $liasse->save();
            $liasse = Liasse::find($liasse->id);
            Trace::traceCreate('Liasse', $request);
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
        $liasse = Liasse::findOrFail($id);
        Liasse::destroy($id);
        Trace::traceDelete('Liasse', $liasse);
        \Session::flash('success', 'La liasse a bien été supprimée!');
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
        if ($fournisseur != NULL && $request != NULL){
            $befFournisseur = clone $fournisseur;
            $fournisseurModified = false;
            if ( $request->input('nickname') != NULL){
                $fournisseur->nickname = $request->input('nickname');
                $fournisseur->comment = $request->input('comment');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('name') != NULL){
                $fournisseur->name = $request->input('name');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('adress') != NULL){
                $fournisseur->adress = $request->input('adress');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('postcode') != NULL){
                $fournisseur->postcode = $request->input('postcode');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('city') != NULL){
                $fournisseur->city = $request->input('city');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('email') != NULL){
                $fournisseur->email = $request->input('email');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('phone') != NULL){
                $fournisseur->phone = $request->input('phone');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if ($request->input('type') != NULL){
                $fournisseur->typefournisseur_id = $request->input('type');
                $fournisseurModified = true;
                $message = 'Le fournisseur a bien été modifié.';
            }
            if( $fournisseurModified ){
                $fournisseur->save();
                Trace::traceUpdate('Fournisseur', $request, $befFournisseur);
            }
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
                $fournisseur->typefournisseur_id = $request->input('type');
            }
            if ($request->input('comment') != NULL){
                $fournisseur->comment = $request->input('comment');
            }
            $fournisseur->save();
            $fournisseur = Fournisseur::find($fournisseur->id);
            Trace::traceCreate('Fournisseur', $request);
            $message = 'Le fournisseur a bien été ajouté.';
            return view('compta.listFournisseur',['fournisseurs'=>Fournisseur::getAllFournisseur()]);
            
        // Affiche la page de création de fournisseur
        } else {
            $fournisseur = new Fournisseur();
            $fournisseur->id = 0;
        }
        return view('compta.fournisseur',
            ['fournisseur'=>$fournisseur,
            'message'=>$message, 'typesfournisseurs' => TypeFournisseur::all()]);
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
        $fournisseur = Fournisseur::findOrFail($id);
        Fournisseur::destroy($id);
        Trace::traceDelete('Fournisseur', $fournisseur);
        \Session::flash('success', 'Le fournisseur a bien été supprimé!');
        return view('compta.listFournisseur',['fournisseurs'=>Fournisseur::getAllFournisseur()]);
    }

    /* --------------------------------------------------- DONS --------------------------------------------------- */

    // Par Anaïs le 27/03/2018
    // Affiche la liste de tous les dons
    public function manageDons(Request $request)
    {
        return view('compta.listDon',['dons'=>Discount::getAllDons()]);
    }

    public function storeTypeFournisseur(Request $request)
    {
        TypeFournisseur::create($request->except('_token'));
        Trace::traceCreate('TypeFournisseur', $request);
        \Session::flash('success', 'Le type de fournisseur a bien été ajouté!');
        return view('compta.manageTypeFournisseur',['typeFournisseurs'=>TypeFournisseur::getAllTypeFournisseur()]);
    }
    /* --------------------------------------------------- TYPE FOURNISSEUR --------------------------------------------------- */

    // Par Anaïs le 03/05/2018
    // Affiche la liste des types de fournisseur
    public function manageTypeFournisseur(){
        return view('compta.manageTypeFournisseur',['typeFournisseurs'=>TypeFournisseur::getAllTypeFournisseur()]);
    }
    
    public function deleteTypeFournisseur($id)
    {
        $fournisseurs = Fournisseur::getAllFournisseur();
        $used = false;
        foreach($fournisseurs as $fournisseur){
            if($fournisseur->typefournisseur_id == $id){
                $used = true;
                break;
            }
        }
        if($used == false){
            $typeFournisseur = TypeFournisseur::find($id);
            TypeFournisseur::destroy($id);
            if( TypeFournisseur::find($id) == NULL ){
              Trace::traceDelete('TypeFournisseur', $typeFournisseur);
              \Session::flash('success', 'Le type de fournisseur a bien été supprimé!');
            }    
        }
        return view('compta.manageTypeFournisseur',['typeFournisseurs'=>TypeFournisseur::getAllTypeFournisseur()]);
    }
}