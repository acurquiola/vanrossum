<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Familia;
use App\Galeria;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
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
        $productos = Producto::orderBy('orden')->orderBy('familia_id')->get();
        return view('adm.productos.index', compact('productos'));
    }

    public function create()
    {
		$familias    = Familia::orderBy('orden')->get();

        return view('adm.productos.create', compact('familias'));
    }

    public function store(Request $request)
    {
		$datos     = $request->all();
		$producto  = new Producto;
		$file_save = Helpers::saveImage($request->file('file_image'), 'productos');
        $file_save ? $datos['file_image'] = $file_save : false;   
    
        $producto->fill($datos);

		$producto->familia_id    = $request->familia_id;

        if($producto->save())
            return redirect('adm/productos/producto')->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }



    public function edit($id)
    {
		$producto    = Producto::find($id);
		//$familias    = Familia::where('nivel', '<=', '1')->orderBy('orden')->get();
		$familias = Familia::all();
    	return view('adm.productos.edit', compact('familias', 'producto'));
    }

    public function update(Request $request, $id)
    {
		$datos     = $request->all();
		$producto  = Producto::find($id);
		$file_save = Helpers::saveImage($request->file('file_image'), 'productos');
        $file_save ? $datos['file_image'] = $file_save : false;       
        $producto->fill($datos);

        $producto->familia_id = $request->familia_id;

        if($producto->save())
            return redirect('adm/productos/producto')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $producto = Producto::find($id);

        if($producto->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }


    public function subfamilias(){
		$input       = Input::get('option');

		$familias    = Familia::find($input);
		$subfamilias = $familias->familia();
	    return response()->json($subfamilias->get(['id', 'nombre']));
    }

}
