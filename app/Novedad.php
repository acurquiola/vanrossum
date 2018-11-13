<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $fillable = [
        'titulo', 'texto', 'file_image', 'caracteristicas', 'galeria', 'orden'
    ];

    public function clasificacion()
    {
    	return $this->belongsTo('App\Clasificacion');
    }   
}
