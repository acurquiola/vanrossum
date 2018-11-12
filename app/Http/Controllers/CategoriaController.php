<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Extensions\Helpers;

class CategoriaController extends Controller
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
		$categorias = Categoria::orderBy('orden')->get();
        return view('adm.preguntas.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.preguntas.categorias.create');
    }

    public function store(Request $request)
    {
		$datos     = $request->all();
		$categoria = new Categoria;  
		$categoria->fill($datos);

        if($categoria->save())
            return redirect('adm/preguntas/categorias')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect('adm/preguntas/categorias')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
        $categoria = Categoria::find($id);

    	return view('adm.preguntas.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
		$datos     = $request->all();
		$categoria = Categoria::find($id);      
        $categoria->fill($datos);

        if($categoria->save())
            return redirect('adm/preguntas/categorias')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/preguntas/categorias')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $categoria = Categoria::find($id);

        if($categoria->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }


}
