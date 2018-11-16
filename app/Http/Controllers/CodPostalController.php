<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;
use App\Codigo;
use App\Imports\CodigosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CodPostalController extends Controller
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

    public function edit(){
    	$archivo = Archivo::first();
    	return view('adm.general.codPostal.edit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$archivo = Archivo::find($id);
		$datos   = $request->all();
    	$archivo->fill($datos);

    	if($request->file('file')!=null){

    		$ruta          = 'archivos';
    		$path          = Storage::putFileAs($ruta, $request->file('file'),'codigo_postal'.$id.'.'.$request->file('file')->getClientOriginalExtension());
    		$rutaNombre    = 'codigo_postal'.$id.'.'.$request->file('file')->getClientOriginalExtension();
    		$archivo->file = $rutaNombre;

       		Excel::import(new CodigosImport, $request->file('file'));
       	}
    	
    	return redirect('adm/general/edit')->with('alert', "Registro actualizado exitósamente" );
    }	

}	
