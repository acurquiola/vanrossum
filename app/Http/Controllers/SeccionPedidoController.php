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
use App\Dato;
use Illuminate\Support\Facades\Input;

use App\Codigo;
use App\Cuenta;
use App\Envio;

use MP;
use Mercadopago;

use Mail;


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


    public function confirmarPedido(Request $request){

   		$compra = Compra::find($request->id);
		$envio  = new Envio;

		$envio->tipo        = $request->envio_tipo;
		$envio->monto       = $request->envio_monto;
		$envio->comentarios = $request->envio_comentarios.$request->envio_codigo;
		$envio->direccion   = $request->envio_direccion;
		$envio->save();


		$compra->envio_id   = $envio->id;
		$compra->monto      = $request->monto;
		$compra->fecha      = Carbon::now();
		
		$compra->medio_pago = ($request->medio_pago == 'mercado_pago')?'Mercado Pago':'Transferencia Bancaria';
		$compra->save();

		Session::put('medio_pago', $request->medio_pago);

        $data = array(['usuario' => \Auth::user(),
                       'pedido'  => $compra->presentaciones(),
                       'compra'  => $compra]);
        Mail::send('page.pedidos.email.email', $data[0], function($message){
                $dato = Dato::where('tipo', 'email')->first();
	    		$message->subject('Has recibido un pedido');
	    		$message->to($dato->descripcion);
	    	}
	    );


		if($compra->medio_pago == 'Mercado Pago'){
			$confirmacion_url = $this->generatePaymentGateway();
			Session::put('confirmacion_url', $confirmacion_url);
			return response()->json(array("text"=>'Done!',"status"=>0 )); 
		}else{
			$compra->estado     = 'procesado';
			$compra->save();

            return response()->json(array("text"=>'Done!',"status"=>0 ));
		}
    }

    public function remove(Request $request){
		$presentacion = Presentacion::find($request->id);
		$compra       = Compra::find($request->compra);

        if($compra->presentaciones()->detach($presentacion))
            return response()->json(array("text"=>'Done!',"status"=>0));
        else
            return response()->json(array("text"=>'Error!',"status"=>1));
    }


	public function generatePaymentGateway()
	{
			
	 	$mp = new MP (env('MERCADOPAGO_CLIENTE_ID'), env('MERCADOPAGO_CLIENTE_SECRET'));
		$current_user = Auth::user();

		$access_token = $mp->get_access_token();

        $compra = Compra::where('user_id', $current_user->id)
                          ->where('estado', 'activo')
                          ->first();

        $pedido = Compra::find($compra->id)->presentaciones()->get();


		foreach ($pedido as $p){

			$preferenceData['items'][] = [
				'id'          => 1,
				'title'       => $p->producto->nombre,            
				'description' => 'Compra de artículos VanRossum mediante Mercadopago',
				'quantity'    => (int)$p->pivot->cantidad,
				'unit_price'  => (float)$p->precio,
				'currency_id' => 'ARS',
			];

		};

		$preference_data = array(
			'external_reference' => 'ORDEN00'.$compra->id,			
			"items" => array(
				array(
					"id" => $compra->id,
					"title" => "Compra de Artículos de VanRossum",
					"currency_id" => "ARS",
					"description" => "Compra de Artículos de VanRossum",
					"quantity" => 1,
					"unit_price" => $compra->monto
				)
			),
			"payer" => array(
				"name" => \Auth::user()->name,
				"email" => \Auth::user()->email, 
				"date_created" => Carbon::now(),
				"address" => array(
					"street_name" => $compra->envio->direccion,
					"zip_code" => $compra->envio->comentarios,
				)
			),
			"back_urls" => array(
				"success" => route('pago.exitoso'),
				"pending" => route('pago.pendiente'),
				"failure" => route('pago.failure'),
			),
		);

		$preference = $mp->create_preference($preference_data);
		$confirmacion_url = $preference['response']['init_point'];


/*
		$mp = new MP (env('MERCADOPAGO_CLIENTE_ID'), env('MERCADOPAGO_CLIENTE_SECRET'));
		$current_user = Auth::user();

		$access_token = $mp->get_access_token();

        $compra = Compra::where('user_id', $current_user->id)
                          ->where('estado', 'activo')
                          ->first();

        $pedido    = Compra::find($compra->id)->presentaciones()->get();
		$preferenceData = [
			'external_reference' => 'ORDEN00'.$compra->id,			
			"back_urls" => [
				"success" => route('pago.exitoso'),
				"pending" => route('pago.pendiente'),
			]
		];

		foreach ($pedido as $p){

			$preferenceData['items'][] = [
				'id'          => 1,
				'title'       => $p->producto->nombre,            
				'description' => 'Compra de artículos Adrimat mediante Mercadopago',
				'quantity'    => (int)$p->pivot->cantidad,
				'unit_price'  => (float)$p->precio,
			];
		};

		$preference       = $mp->create_preference($preferenceData);
		
		$confirmacion_url = $preference['response']['init_point'];*/
		
		return $confirmacion_url; 
	}

	public function procesarPago(){
		return view('page.pedidos.confirmacion');
	}



    public function success(){

        $compra = Compra::where('user_id', Auth::user()->id)
                          ->where('estado', 'activo')
                          ->first();

        $compra->estado = 'procesado';
        $compra->save();


        return view('page.pedidos.success');
    }

    public function pending(){

        $compra = Compra::where('user_id', Auth::user()->id)
                          ->where('status', 'activo') //Compra procesada pero no se ha comprobado el pago
                          ->first();

        $compra->estado = 'procesado';
        $compra->save();

        return view('page.pedidos.pendiente');
    }


    public function failure(){

        return view('page.pedidos.failure');
    }


}
