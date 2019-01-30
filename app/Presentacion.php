<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $fillable = [
    	'cantidad', 'precio', 'precio_dolar', 'unidad', 'producto_id'  
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }    

    public function unidad()
    {
        return $this->belongsTo('App\Unidad');
    }   

    public function descuentos_desde()
    {
        return $this->belongsTo('App\Descuento', 'desde_id');
    } 

    public function descuentos_hasta()
    {
    	return $this->belongsTo('App\Descuento', 'hasta_id');
    }   
    
    public function compras()
    {
        return $this->belongsToMany('App\Compra')->withPivot('descuento', 'cantidad');
    }
}
