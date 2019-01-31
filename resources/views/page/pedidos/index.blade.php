@extends('app')

@section('content')


<body>


	<div class="container" id="container-fluid">

		@guest()

			<div class="col s12">
				<div id="header-secciones">
					<span >MI CUENTA</span>
				</div>
			</div>	

			<div class="row">
				

				<div class="col s12 m12 l4">
					
					@include('auth.login')

				</div>

				<div class="col s12 m12 l7 offset-l1">
					
					@include('auth.register')

				</div>

			</div>

		@endguest

		@auth('web')
			<div class="col s12">
				<div id="header-secciones">
					<span >MI CARRITO</span>
				</div>
			</div>

			<table class="orden-table">
				<thead >
					<tr class="carrito-th">
						<th>
							
						</th>
						<th class="center">
							PRODUCTO
						</th>
						<th class="center">
							PRESENTACIÓN 
						</th>
						<th class="center">
							CÓDIGO 
						</th>
						<th class="center">
							CANTIDAD 
						</th>
						<th class="center">
							SUBTOTAL 
						</th>
						<th class="center">
							ELIMINAR 
						</th>
					</tr>
				</thead>
				<tbody>
					@forelse($compra->presentaciones as $p)
						<tr class="carrito-tr">
							<td class="image-carrito">
								<img src="{{ asset('images/productos/'.$p->producto->file_image) }}">
							</td> 
							<td class="center">
								{{ $p->producto->nombre }}
							</td>
							<td class="center">
								{{ $p->cantidad }} {{ $p->unidad->abreviacion }} 
							</td>
							<td class="center">
								{{ $p->producto->codigo }}
							</td>
							<td class="center">
								{{ $p->pivot->cantidad }}
							</td>
							<td style="text-align: right" class="subtotal-producto" data-descuento="{{ $p->pivot->descuento }}">
								${{ $p->cantidad * $p->pivot->cantidad * $p->precio }} 
							</td>
							<td class="center icon-remove">
								<i class="fas fa-trash-alt"></i>
							</td>
						</tr>
					@empty
					<tr>
						<td colspan="7" class="center">
							No hay productos en el carrito de compras
						</td> 
					</tr>
					@endforelse
				</tbody>
			</table>

			<div class="row">
				<div class="col s12 m12 l6 offset-l6">
					<div class="div-envios">
						<p class="titulo-pago">ENVÍO</p>
						<p class="subtitulo-pago">SELECCIONE UN MÉTODO DE ENVÍO</p>
						<div class="group-radio">
							
							
							<p>
								<label>
									<input class="with-gap" name="entrega" type="radio" id="retiro_local" />
									<span>Retiro por local</span>
								</label>
							</p>
							
							<p>
								<label>
									<input class="with-gap" name="entrega" type="radio" id="envio"  />
									<span>Envío a CABA y GBA</span>
									<div class="row">
										<div class="col s12 l4 offset-l1"> 
											<input type="text" name="envio" id="codigo_postal" placeholder="Código Postal" disabled>
										</div>
										<div class="col s12 l4"> 
											<input type="text" name="envio_precio" id="codigo_postal_monto" disabled>
										</div>
									</div>
								</label>
							</p>
						
							<p>
								<label>
									<input class="with-gap" name="entrega" type="radio"  id="express" />
									<span>Express - Retiro en local</span>
									<div class="row">
										<div class="col s12 l12"> 
											<input type="text" name="mensaje_express" id="mensaje_express" disabled>
										</div>	
									</div>
								</label>
							</p>
						</div>
					</div>
				</div>
			</div>




			<div class="row">
				<div class="col s12 m12 l6 offset-l6">
					<div class="div-pago">
						<p class="titulo-pago">SISTEMA DE PAGO</p>
						<p class="subtitulo-pago">SELECCIONE UN MÉTODO DE PAGO</p>
						<div class="group-radio">							
							<p>
								<label>
									<input class="with-gap" name="pago" type="radio" id="mercado_pago" />
									<span>Mercado Pago</span>
								</label>
							</p>
							<p>
								<label>
									<input class="with-gap" name="pago" type="radio" id="transferencia_bancaria" />
									<span>Transferencia Bancaria</span>
								</label>

								<div id="cuenta-bancaria">
									{{ $cuenta_bancaria->descripcion }}
								</div>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12 l6 offset-l6" id="calculo-total">
					<div class="col s6"> 
						<span style="font-size: 13px;">Subtotal</span>
					</div>	
					<div class="col s6"> 
						<span class="right" class="montos-totales" id="subtotalTotal">$ 0,00</span>
					</div>					
				</div>
				<div class="col s12 l6 offset-l6">
					<div class="col s6"> 
						<span style="font-size: 13px;">Descuento</span>
					</div>	
					<div class="col s6"> 
						<span class="right" class="montos-totales" id="descuentoTotal">$ 0,00</span>
					</div>					
				</div>
				<div class="col s12 l6 offset-l6">
					<div class="col s6"> 
						<span style="font-size: 13px;">Envío</span>
					</div>	
					<div class="col s6"> 
						<span class="right" class="montos-totales" id="envioTotal">$0.00</span>
					</div>					
				</div>
				<div class="col s12 l6 offset-l6" id="div-monto">
					<div class="col s6"> 
						<span style="font-size: 13px;">Total (IVA incluido)</span>
					</div>	
					<div class="col s6"> 
						<span class="right" id="total-pedido">$0.00</span>
					</div>					
				</div>
			</div>

			<input type="hidden" id="tipo_envio">
			<input type="hidden" id="medio_pago">

			<div class="row ">			 	
				<div class="col s12 l6 left" >
					<a href="{{ action('SeccionProductoController@index') }}" id="estandar-btn-otro" class="waves-effect waves-light btn z-depth-0" >AGREGAR PRODUCTOS</a>
				</div>
		
				<div class="col s12 l6" >
					<a data-compra="{{ $compra->id }}" onclick="return confirm('¿Está seguro que desea procesar la compra?')"  id="estandar-btn" class="waves-effect waves-light btn right z-depth-0" >PROCESAR COMPRA</a>
				</div>
			</div>

		@endauth
	</div>

	@endsection

	@include('layouts.script')

	<script type="text/javascript">
	
		$(document).ready(function(){
			subtotal       = 0;
			subtotal_monto = 0;
			descuento      = 0;
			valor          = 0;

			$("input[name=entrega]").change(function(){
				var value = $(this).val();
				var id    = $(this).attr('id');

				if(id == 'envio'){				
					$('#codigo_postal').removeAttr('disabled');
					$('#tipo_envio').val(id);

				}else{
					$('#codigo_postal').attr('disabled','disabled');
					$('#codigo_postal_monto').val('');
					$('#envioTotal').html('$ 0.00');
					
					var montoTotal = parseFloat(subtotal_monto).toFixed(2) - parseFloat(descuento).toFixed(2);

					$('#total-pedido').html('$ '+montoTotal);

				}

				if(id == 'express'){				
					$('#mensaje_express').removeAttr('disabled');
					$('#tipo_envio').val(id);

				}else{
					$('#mensaje_express').attr('disabled','disabled');
				}

				if(id == 'retiro_local'){				
					$('#tipo_envio').val(id);
				}

			});

			$("input[name=pago]").change(function(){
				var value = $(this).val();
				var id    = $(this).attr('id');
				if(id == 'transferencia_bancaria'){				
					$('#cuenta-bancaria').show('slow');
					$('#medio_pago').val(id);

				}else{		
					$('#cuenta-bancaria').hide('slow');
					$('#medio_pago').val('mercado_pago');
				}
			});

			$('.orden-table').find('.subtotal-producto').each(function(){

				//Cálculo de subtotal

				var subtotal_producto = $(this).html();				
				var monto             = subtotal_producto.split('$')[1];				
				subtotal_monto        = parseFloat(monto) + parseFloat(subtotal_monto);

				//Cálculo de descuento
				
				var descuento_producto = $(this).data('descuento');
				descuento              = parseFloat(descuento_producto) + parseFloat(descuento);


			});


			$('#subtotalTotal').html('$ '+subtotal_monto.toFixed(2));
			$('#descuentoTotal').html('$ '+descuento.toFixed(2));

			var montoTotal = parseFloat(subtotal_monto).toFixed(2) - parseFloat(descuento).toFixed(2);

			$('#total-pedido').html('$ '+montoTotal);


			$('#codigo_postal').on('change', function() { 
			    var codigo = $(this).val(); 
			    var consultarMontoEnvio = "{{ action('SeccionPedidoController@consultarMontoEnvio') }}";

		        $.ajax({
	        		data:{codigo: codigo},
	        		method: 'GET',
		        	url: consultarMontoEnvio,
				  	headers: {
				    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  	}
		        })
		        .always(function(response, status, responseObject){
	        		if(response['status'] == 0){
						$('#codigo_postal_monto').val('$ '+response['codigo']['envio']);
						$('#envioTotal').html('$ '+response['codigo']['envio']);
						
						var montoDescuento = $('#envioTotal').html();
						var montoDescuento = montoDescuento.split('$')[1];

						montoTotal = montoTotal + parseFloat(montoDescuento);

						$('#total-pedido').html('$ '+montoTotal);


	        		}
		        });

			});




			$('#estandar-btn').click(function(){

				var compra_id         = $(this).data('compra');
				var envio_tipo        = $('#tipo_envio').val();
				var medio_pago        = $('#medio_pago').val();
				var monto             = ($('#total-pedido').html()).split('$')[1];
				var envio_monto       = ($('#envioTotal').html()).split('$')[1];
				
				var envio_codigo      = $('#codigo_postal').val();
				
				var envio_comentarios = $('#mensaje_express').val();
				
				var confirmarPedido   = "{{ action('SeccionPedidoController@confirmar')}}";

		        $.ajax({
	        		data:{id: compra_id,
	        			  envio_tipo: envio_tipo,
	        			  envio_codigo: envio_codigo,
	        			  envio_monto: envio_monto,
	        			  envio_comentarios: envio_comentarios,
	        			  medio_pago: medio_pago,
	        			  monto: monto },
	        		method: 'POST',
		        	url: confirmarPedido,
				  	headers: {
				    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  	}
		        })
		        .always(function(response, status, responseObject){
	        		if(response['status'] == 0){
	        		console.log(status);
	        		}
	        		
		        });


			});




		});
		

	</script>

</body>
</html>

