<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'miaou_invoices';

	protected $fillable = [
		'date_ajout',
		'fournisseur_id',
		'numero_facture',
		'date_facture',
		'montant',
		'date_reglement',
		'commentaire'
	];

	public function fournisseur()
	{
		return $this->belongsTo('App\Fournisseur');
	}
}
