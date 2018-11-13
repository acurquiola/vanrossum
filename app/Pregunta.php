<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
    	'pregunta', 'respuesta', 'orden'
    ];


    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }   
}
