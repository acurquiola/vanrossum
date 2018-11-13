<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SeccionHomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('seccion', 'home')->orderBy('orden')->get();
        return view('page.home.index', compact('sliders'));
    }

    public function buscador(Request $request)
    {
        $busqueda  = $request->nombre;
        $resultado = Producto::where('nombre', 'like', '%'.$busqueda.'%')->get();
        $seccion   = 'Búsqueda';
        $metadato  = Metadato::where('seccion', 'productos')->first();

        return view('page.home.busqueda', ['resultado' => $resultado, 'seccion' => $seccion, 'metadato' => $metadato]);
    }
}
