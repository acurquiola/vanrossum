<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
    	'nombre', 'orden' 
    ];


    public function preguntas()
	{
	    return $this->hasMany('App\Pregunta');
	}
    
}
