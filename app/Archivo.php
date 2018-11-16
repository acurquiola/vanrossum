<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
    	'nombre', 'file'
    ];

    public function codigos()
    {
        return $this->hasMany('App\Codigo');
    }   
}
