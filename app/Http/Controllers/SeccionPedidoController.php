<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Carbon\Carbon;
use App\Compra;
use App\Producto;
use App\Descuento;
use App\Presentacion;
use Illuminate\Support\Facades\Input;

use App\Codigo;
use App\Cuenta;
use App\Envio;


class SeccionPedidoController extends Controller
{
    public function index(){
		$cuenta_bancaria = Cuenta::first();

		if(Auth::check()){
			$user_id = \Auth::user()->id;
			$compra  = Compra::where('user_id', $user_id)->where('estado', 'activo')->first();

    		if(!$compra){
				$compra           = new Compra;
				$compra->estado   = 'activo';
				$compra->user_id  = \Auth::user()->id;
				$compra->envio_id = 1;
				
				if($compra->save()){
					if(Session::has('presentaciones')){						

						$presentaciones = Session::get('presentaciones');
						
						$descuentos     = Session::get('descuentos');



						foreach ($presentaciones as $id => $cant) {
							if($cant != null && $cant != '0' ){
								$descuento_presentacion = $descuentos[$id];
								$presentacion           = Presentacion::find($id);

								$exists = $compra->presentaciones->contains($presentacion);

								if($exists == true){
									$compra->presentaciones()->detach($presentacion);
									$compra->presentaciones()->attach($presentacion, ['cantidad' => $cant, 'descuento' => ($descuento_presentacion == null)?'0':$descuento_presentacion]);
								}else{
									$compra->presentaciones()->attach($presentacion, ['cantidad' => $cant, 'descuento' => ($descuento_presentacion == null)?'0':$descuento_presentacion]);
								}

								$user = Auth::user();
								Session::flush();
								\Auth::login($user);
							}
						}
					}

				}
    		}else{
				if(Session::has('presentaciones')){						

					$presentaciones = Session::get('presentaciones');
						
					$descuentos     = Session::get('descuentos');



					foreach ($presentaciones as $id => $cant) {

						if($cant != null && $cant != '0' ){
							$descuento_presentacion = $descuentos[$id];
							$presentacion           = Presentacion::find($id);
							
							
							$exists = $compra->presentaciones->contains($presentacion);

							if($exists == true){
								$compra->presentaciones()->detach($presentacion);
									$compra->presentaciones()->attach($presentacion, ['cantidad' => $cant, 'descuento' => ($descuento_presentacion == null)?'0':$descuento_presentacion]);
							}else{
								$compra->presentaciones()->attach($presentacion, ['cantidad' => $cant, 'descuento' => ($descuento_presentacion == null)?'0':$descuento_presentacion]);
							}

							$user = Auth::user();
							Session::flush();
							\Auth::login($user);
						}
					}
				}

    		}

    		$compra = Compra::where('user_id', \Auth::user()->id)->where('estado', 'activo')->first();
    		return view('page.pedidos.index', compact('compra', 'cuenta_bancaria', 'user_id'));
    			
    	}else{
    		return view('page.pedidos.index');
    	}
 
    }
    

    public function store(Request $request){

		Session::put('producto_id', $request->id);
		Session::put('presentaciones', $request->presentaciones);
		Session::put('descuentos', $request->descuentos);
		Session::put('total_total', $request->total_total);
		Session::put('total_descuento', $request->total_descuento);

		if(Session::exists('producto_id') && Session::exists('presentaciones') && Session::exists('descuentos') && Session::exists('total_total') && Session::exists('total_descuento') )
            return response()->json(array("text"=>'Done!',"status"=>0));
        else
            return response()->json(array("text"=>'Error agregando los productos',"status"=>1));
    }

    public function consultarMontoEnvio(){
		$input  = Input::get('codigo');
		$codigo = Codigo::where('codigo', $input)->first();

		if($codigo)
            return response()->json(array("text"=>'Done!',"status"=>0, "codigo" => $codigo));
        else
            return response()->json(array("text"=>'Código Postal no encontrado',"status"=>1));

    }


    public function confirmar(Request $request){
   		$compra = Compra::find($request->id);
		$envio  = new Envio;

		if($request->envio_tipo == 'envio')
			$envio->tipo        = 'Envio';
		

		if($request->envio_tipo == 'express')
			$envio->tipo        = 'Express';
		
		if($request->envio_tipo == 'retiro_local')
			$envio->tipo        = 'Retiro por Local';
		
		$envio->monto       = $request->envio_monto;
		$envio->comentarios = $request->envio_comentarios;

		$envio->save();
		
		$compra->envio_id   = $envio->id;
		$compra->monto      = $request->monto;
		$compra->estado     = 'procesado';
		$compra->fecha      = Carbon::now();
		
		$compra->medio_pago = ($request->medio_pago == 'mercado_pago')?'Mercado Pago':'Transferencia Bancaria';

		if($compra->save())
            return response()->json(array("text"=>'Done!',"status"=>0));
        else
            return response()->json(array("text"=>'No se puedo procesar la compra',"status"=>1));
    }

    public function remove(Request $request){
		$presentacion = Presentacion::find($request->id);
		$compra       = Compra::find($request->compra);

        if($compra->presentaciones()->detach($presentacion))
            return response()->json(array("text"=>'Done!',"status"=>0));
        else
            return response()->json(array("text"=>'Error!',"status"=>1));
    }
}
