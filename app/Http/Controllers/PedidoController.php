<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
    	$seccion = 'Carrito';
    	return view('pedidos.index', compact('seccion'));
    }

    public function store(Request $request){
    	$request->all();
    }
}
