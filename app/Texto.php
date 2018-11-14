<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $fillable = [
    	'home_titulo', 'home_subtitulo'
    ];
}
