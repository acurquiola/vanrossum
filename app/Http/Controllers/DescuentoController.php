<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descuento;
use App\Presentacion;
use App\Producto;

class DescuentoController extends Controller
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
		$descuentos = Descuento::with('desde')->with('hasta')->where('producto_id', $id)->get();
		$producto   = Producto::find($id);

        return view('adm.productos.descuentos.index', compact('descuentos', 'producto'));
    }

    public function create($id)
    {
		$producto       = Producto::find($id);
		$presentaciones = Presentacion::where('producto_id', $producto->id)->orderBy('cantidad')->get();

        return view('adm.productos.descuentos.create', compact('producto', 'presentaciones'));
    }

    public function store(Request $request, $id)
    {
        $datos                  = $request->all();
        $descuento              = new Descuento;
        $descuento->desde_id    = $request->desde_id;
        $descuento->hasta_id    = $request->hasta_id;
        $descuento->descuento   = $request->descuento;
        $descuento->producto_id = $id;

        if($descuento->save())
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
