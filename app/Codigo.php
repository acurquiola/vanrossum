<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    protected $fillable = [
    	'ubicacion','codigo', 'envio'
    ];

    public function archivo()
    {
        return $this->belongsTo('App\Archivo');
    }  
}
