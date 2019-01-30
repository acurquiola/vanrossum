<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
    	'nombre', 'descripcion', 'codigo', 'file_image', 'orden'
    ];
    
/*    protected $guarded = [];
    protected $connection="firebird";



   protected $primaryKey = 'Codigo';
*/

 //   public $timestamps = false;

    public function familia()
    {
    	return $this->belongsTo('App\Familia');
    }   

    public function presentaciones()
    {
        return $this->hasMany('App\Presentacion');
    }

    public function descuentos()
	{
	    return $this->hasMany('App\Descuento');
	}
    
    public function galerias()
    {
        return $this->hasMany('App\Galeria');
    }

}
