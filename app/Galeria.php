<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = [
    	'orden', 'file_image'
    ];

	public function producto()
	{
		return $this->belongsTo('App\Producto');
	}
}
