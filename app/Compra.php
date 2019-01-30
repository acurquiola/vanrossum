<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
    	'monto','fecha', 'estado', 'medio_pago'
    ]; 

    public function envio()
    {
        return $this->belongsTo('App\Envio');
    }

    public function clientes()
    {
    	return $this->belongsTo('App\User');
    }   


    public function presentaciones()
    {
        return $this->belongsToMany('App\Presentacion')->withPivot('descuento', 'cantidad');
    }

}
