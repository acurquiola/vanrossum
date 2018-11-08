<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Extensions\Helpers;

class SubfamiliaController extends Controller
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
		$familia_padre = Familia::find($id);
		$familias      = Familia::where('familia_id', $familia_padre->id)->orderBy('orden')->get();
		$nivel         = $familia_padre->nivel+1;

        return view('adm.productos.familias.index', compact('familias', 'familia_padre', 'nivel'));
    }

    public function create($id)
    {
		$familia_padre = Familia::find($id);
		$nivel         = $familia_padre->nivel+1;

        return view('adm.productos.familias.create', compact('familia_padre', 'nivel'));
    }

    public function store(Request $request, $id)
    {   
        $datos          = $request->all();

        $familia_padre  = Familia::find($id);
        $familia        = new Familia;
        $familia->nivel = $familia_padre->nivel+1;   
        $file_save      = Helpers::saveImage($request->file('file_image'), 'familias');
        $file_save ? $datos['file_image'] = $file_save : false; 
        $familia->familia_id = $id;
        $familia->fill($datos);

        if($familia->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );

    }

}
