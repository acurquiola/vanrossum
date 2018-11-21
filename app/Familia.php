<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = [
    	'nombre', 'file_image', 'orden' 
    ];

    public function subfamilias()
	{
	    return $this->hasMany('App\Familia', 'familia_id');
	}

    public function productos()
	{
	    return $this->hasMany('App\Producto');
	}
}
