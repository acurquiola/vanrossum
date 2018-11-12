<?php


namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;
use App\Extensions\Helpers;

class UnidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    function index()
    {
        $unidades = Unidad::all();
        return view('adm.productos.unidades.index',  compact('unidades'));
    }

    function create()
    {
        return view('adm.productos.unidades.create', compact('unidades'));
    }

    public function store(Request $request)
    {
		$datos  = $request->all();
		$unidad = new Unidad;
        $unidad->fill($datos);

        if($unidad->save())
            return redirect('adm/unidades/unidad')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );

    }

    function edit($id)
    {
        $unidades = Unidad::find($id);

        return view('adm.productos.unidades.edit', compact('unidades'));
    }


    public function update(Request $request)
    {
		$datos  = $request->all();
		$unidad = Unidad::find($id);
        $unidad->fill($datos);

        if($unidad->save())
            return redirect('adm/unidades/unidad')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );

    }

    public function eliminar($id)
    {
        $unidad = Unidad::find($id);

        if($unidad->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
