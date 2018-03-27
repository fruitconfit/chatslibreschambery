<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'miaou_invoices';

	protected $fillable = [
		'date_ajout',
		'provider_id',
		'numero_facture',
		'date_facture',
		'montant',
		'date_reglement',
		'commentaire'
	];
}
