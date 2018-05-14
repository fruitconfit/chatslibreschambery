<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFournisseur extends Model
{

	protected $fillable = [
		'id',
		'nom'
	];
	
    protected $table = 'miaou_typesfournisseurs';

}
