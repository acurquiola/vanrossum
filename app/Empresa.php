<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
    	'file_image', 'mision', 'vision', 'valores'  
    ];
}
