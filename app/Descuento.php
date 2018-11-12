<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
    	'descuento'  
    ];

    public function desde()
    {
        return $this->hasOne('App\Presentacion', 'id', 'desde_id');
    }   


    public function hasta()
    {
        return $this->hasOne('App\Presentacion', 'id', 'hasta_id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }   
   
}
