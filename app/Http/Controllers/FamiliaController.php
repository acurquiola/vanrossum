<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Extensions\Helpers;

class FamiliaController extends Controller
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

    public function index()
    {
        $familias = Familia::where('nivel', '1')->orderBy('orden')->get();
        $nivel    = '1';
        return view('adm.productos.familias.index', compact('familias', 'nivel'));
    }

    public function create()
    {
        $nivel = '1';
        return view('adm.productos.familias.create', compact('nivel'));
    }

    public function store(Request $request)
    {
        $datos     = $request->all();
        $familia   = new Familia;
        $file_save = Helpers::saveImage($request->file('file_image'), 'familias');
        $file_save ? $datos['file_image'] = $file_save : false;    
        $familia->familia_id = 1;   
        $familia->fill($datos);

        if($familia->save())
            return redirect('adm/productos/familias')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect('adm/productos/familias')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
        $familia = Familia::find($id);
        $nivel   = $familia->nivel;
        $familia_padre = null;
        if($nivel>'1')
            $familia_padre = Familia::find($familia->familia_id);

    	return view('adm.productos.familias.edit', compact('familia', 'nivel', 'familia_padre'));
    }

    public function update(Request $request, $id)
    {
        $datos     = $request->all();
        $familia   = Familia::find($id);
        $file_save = Helpers::saveImage($request->file('file_image'), 'familias');
        $file_save ? $datos['file_image'] = $file_save : false;       
        $familia->fill($datos);

        if($familia->save())
            return redirect('adm/productos/familias')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/productos/familias')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $familia = Familia::find($id);

        if($familia->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }


}
