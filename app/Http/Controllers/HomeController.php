<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informacion;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Redirect;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $informacions = Informacion::orderBy('orden')->get();
        return view('adm.home.informacion.index', compact('informacions'));
    }

    public function edit($id){
        $informacion = Informacion::find($id);
        return view('adm.home.informacion.edit', compact('informacion'));
    }

    public function update(Request $request, $id){
        $informacion = Informacion::find($id);
        $datos       = $request->all();
        
        $file_save   = Helpers::saveImage($request->file('file_image'), 'home');
        $file_save ? $datos['file_image'] = $file_save : false;
        
        $informacion->fill($datos);

        if($informacion->save())
            return redirect('adm/home/informacion/ver')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

}
