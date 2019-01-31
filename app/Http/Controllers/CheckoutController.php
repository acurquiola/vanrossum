<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;
use Mercadopago;
use Auth;

class CheckoutController extends Controller
{

	public function generatePaymentGateway()
	{
			
	 	$mp = new MP (env('MERCADOPAGO_CLIENTE_ID'), env('MERCADOPAGO_CLIENTE_SECRET'));
		$current_user = Auth::user();

		$access_token = $mp->get_access_token();

        $compra = Compra::where('user_id', $current_user->id)
                          ->where('estado', 'activo')
                          ->first();

        $pedido = Compra::find($compra->id)->presentaciones()->get();

		$preferenceData = [
			'external_reference' => 'ORDEN00'.$compra->id,			
			"back_urls" => [
				"success" => route('pago.exitoso'),
				"pending" => route('pago.pendiente'),
			]
		];

		foreach ($pedido as $p){
			dd($p);

			$preferenceData['items'][] = [
				'id'          => 1,
				'title'       => $p->nombre,            
				'description' => 'Compra de artículos Adrimat mediante Mercadopago',
				'quantity'    => (int)$p->pivot->cantidad,
				'unit_price'  => $p->precio,
			];
		};

		$preference = $mp->create_preference($preferenceData);

		$confirmacion_url = $preference['response']['init_point'];

		return view('page.pedidos.confirmacion', compact('confirmacion_url', 'pedido')); 
	}
}
