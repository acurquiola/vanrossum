<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;

class SeccionProductoController extends Controller
{
    public function index(){
    	$familias = Familia::where('nivel', '1')->orderBy('orden')->get();
    	$seccion = 'Productos';

    	return view('page.productos.index', compact('familias', 'seccion'));
    }
}
