<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $fillable = [
    	'nombre', 'abreviacion'
    ];

    public function presentaciones()
	{
	    return $this->hasMany('App\Presentacion');
	}
}
