<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Producto;

class SeccionProductoController extends Controller
{
    public function index(){
    	$familias = Familia::where('nivel', '1')->orderBy('orden')->get();
    	$seccion = 'Productos';

    	return view('page.productos.index', compact('familias', 'seccion'));
    }

    public function listar($id, $padre){
        $pathItem  = 'images/familias/';
        $items     = Familia::where('familia_id', $id)->get();
        $productos = Producto::where('familia_id', $id)->get();
      /*  $tipo      = 'familia';
        if($productos->count() == '0'){
            $items    = Producto::where('familia_id', $id)->get();
            $pathItem = 'images/productos/';
            $tipo     = 'producto';
        }*/
        $familia = Familia::find($id);
        $seccion = 'Productos';

        $familia_padre = Familia::find($padre);

        return view('page.productos.listar', compact('pathItem', 'familia', 'items', 'isFamilia', 'seccion', 'familia_padre', 'tipo', 'productos'));
    }

    public function show($id, $padre){
        $producto      = Producto::find($id);
        $familia_padre = Familia::find($padre);
        $seccion       = 'Productos';

    	return view('page.productos.show', compact('producto', 'familia_padre', 'seccion'));
    }
}
