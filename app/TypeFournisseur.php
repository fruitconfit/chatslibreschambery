<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeFournisseur extends Model
{

	protected $fillable = [
		'id',
		'nom'
	];
	
	protected $table = 'miaou_typesfournisseurs';
	
    // Par Anaïs le 03/05/2018
    // Récupère la liste des types de fournisseur
    public static function getAllTypeFournisseur(){
        $typeFournisseurs = DB::table('miaou_typesfournisseurs')->get();
        $listTypeFournisseur = array();
        foreach($typeFournisseurs as $typeFournisseur){
            $typeFournisseurTemp = TypeFournisseur::find($typeFournisseur->id);
            array_push($listTypeFournisseur, $typeFournisseurTemp);
        }
        return $listTypeFournisseur;
    }

}
