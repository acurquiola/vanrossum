<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Presentacion;
use App\Producto;
use App\Unidad;
use Goutte\Client;
use App\Extensions\Helpers;

class PresentacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id)
    {
		$presentaciones = Presentacion::where('producto_id', $id)->orderBy('cantidad')->get();
		$producto       = Producto::find($id);

        return view('adm.productos.presentaciones.index', compact('presentaciones', 'producto'));
    }

    public function create($id, Client $client)
    {
        $producto = Producto::find($id);
        $unidades = Unidad::all();
        $cliente  = New Client;
        $dolar    = Helpers::dolar($cliente);
        return view('adm.productos.presentaciones.create', compact('producto','unidades', 'dolar'));
    }

    public function store(Request $request, $id)
    {
        $datos                     = $request->all();
        $presentacion              = new Presentacion;
        $presentacion->producto_id = $id;
        
        $presentacion->cantidad    = $request->cantidad;
        $presentacion->unidad_id   = $request->unidad_id;
        $presentacion->precio      = $request->precio;

        if($presentacion->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
        $presentacion = Presentacion::find($id);
        $producto     = Producto::find($presentacion->producto_id);
        $unidades     = Unidad::all();
        return view('adm.productos.presentaciones.edit', compact('producto','unidades', 'presentacion'));
    }

    public function update(Request $request, $id)
    {
        $presentacion              = Presentacion::find($id);
        $presentacion->producto_id = $presentacion->producto_id;
        $presentacion->cantidad    = $request->cantidad;
        $presentacion->unidad_id   = $request->unidad_id;
        $presentacion->precio      = $request->precio;

        if($presentacion->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $presentacion = Presentacion::find($id);

        if($presentacion->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

    

}
