<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;

class CuentaController extends Controller
{
    public function index(){
    	$cuentas = Cuenta::get();
    	return view('adm.cuentas.index', compact('cuentas'));
    }

    public function edit($id){
    	$cuenta = Cuenta::find($id);
    	return view('adm.cuentas.edit', compact('cuenta'));
    }

    public function update(Request $request, $id){
    	$cuenta = Cuenta::find($id);

    	$cuenta->descripcion = $request->descripcion;

    	if($cuenta->save())
            return redirect('adm/cuentas')->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect('adm/cuentas')->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }
}
