<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// Par Anaïs le 20/03/2018
class Fournisseur extends Model
{
    protected $fillable = [
        'id', 
        'nickname', 
        'name', 
        'adress',
        'postcode', 
        'city', 
        'email',
        'phone', 
        'type', 
        'comment'
    ];
    
    // Par Anaïs le 20/03/2018
    // Récupère la liste de tous les fournisseurs
    public static function getAllFournisseur(){
        $fournisseurs = DB::table('fournisseurs')->get();
        $listFournisseur = array();
        foreach($fournisseurs as $fournisseur){
            $liasseTemp = Fournisseur::find($fournisseur->id);
            array_push($listFournisseur, $liasseTemp);
        }
        return $listFournisseur;
    }
}
