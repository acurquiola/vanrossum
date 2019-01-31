<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $fillable = [
    	'tipo','comentarios', 'monto', 'direccion'
    ];
    
    public function compra()
    {
        return $this->hasOne('App\Compra');
    }

}
