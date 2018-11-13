<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Categoria;

class PreguntaController extends Controller
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
		$preguntas = Pregunta::orderBy('orden')->get();
        return view('adm.preguntas.index', compact('preguntas'));
    }

    public function create()
    {
    	$categorias = Categoria::orderBy('orden')->get();
        return view('adm.preguntas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
		$datos    = $request->all();
		$pregunta = new Pregunta;  
		$pregunta->categoria_id = $request->categoria_id;
		$pregunta->fill($datos);

        if($pregunta->save())
            return redirect('adm/preguntas/pregunta')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect('adm/preguntas/pregunta')->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }


    public function edit($id)
    {
		$categorias = Categoria::orderBy('orden')->get();
		$pregunta   = Pregunta::find($id);

    	return view('adm.preguntas.edit', compact('pregunta', 'categorias'));
    }

    public function update(Request $request, $id)
    {
		$datos    = $request->all();
		$pregunta = Pregunta::find($id);      
		$pregunta->categoria_id = $request->categoria_id;
        $pregunta->fill($datos);

        if($pregunta->save())
            return redirect('adm/preguntas/pregunta')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/preguntas/pregunta')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $pregunta = Pregunta::find($id);

        if($pregunta->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
