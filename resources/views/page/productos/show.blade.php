@extends('app')

@section('content')


<body>


	<div class="container" style="width: 85%">

		@include('page.partials.header-secciones')

		<div class="row" id="familias-row">
			
			@include('page.productos.partials.menu')

			<div class="col s12 m12 l9 ">
				<div class="row">

					<div class="col s12 m12 l6 center" style="border: 1px solid #EFF2F7; border-radius: 5px"> 
						<div class="slider"">
							<ul class="slides">
								<li>
									<img src="{{ asset('images/productos/'.$producto->file_image) }}" alt="">
								</li>

								@if($producto->galerias->count() > 0)
								@foreach($producto->galerias as $s)
								<li>
									<img src="{{ asset('images/galeria_productos/'.$s->file_image) }}" alt="">
								</li>
								@endforeach
								@endif
							</ul>
						</div>					
					</div>
					<div class="col s12 m12 l6">
						<p id="productos-show-nombre">{{ $producto->nombre }}</p>
						<p id="productos-show-codigo"> Cód: {{$producto->codigo}}</p>
						<p id="productos-show-descripcion">{{ $producto->descripcion }}</p>
					</div>

				</div>


				@if($producto->presentaciones->count() > 0)

				<div class="row" id="presentaciones-row">
					<div class="col s12">
						<div class="col s12 m6">
							<p id="titulo-presentaciones">Presentaciones</p>
						</div>
						<div class="col s12 m6">
							<p id="titulo-iva" class="right">Precio Final IVA incluido</p>
						</div>
						<table id="presentaciones-table" class="centered">
							<tbody>
								@foreach($producto->presentaciones as $p)
								<tr>
									<td id="cantidad-presentaciones-td">{{ $p->cantidad}} {{$p->unidad->abreviacion }}</td>
									<td>${{ $p->precio }}</td>
									<td class="right"><input type="number" class="cantidad-input" data-precio="{{ $p->precio }}" data-presentacion="{{ $p->cantidad }}" min="0" style="width: 50px" name="cantidad[]" value="0"></td>
									<td></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr style="border-bottom-color: #F9F9F9 !important">
									<td colspan="3">
										<div class="right" style="border-bottom: 1px solid #3F3F3F; width: 200px; margin-top: 20px">
											<strong>
												<span id="simbolo-moneda">$</span>
												<span id="total" class="right">0.00</span>
											</strong>
										</div>
									</td>
								</tr>
								<tr  style="border-bottom-color: #F9F9F9 !important">										
									<td colspan="3"><p id="titulo-iva" class="right">Precio Final IVA incluido</p></td>
								</tr>	
								<tr >										
									<td colspan="3" >									
										<a id="estandar-btn" class="waves-effect waves-light btn right z-depth-0" ><i class="material-icons left">shopping_cart</i>AÑADIR AL CARRITO</a>
									</td>
								</tr>									
							</tfoot>
						</table>

					</div>
				</div>

				@endif

				@if($producto->descuentos->count() > 0)

				<div class="row" id="descuentos-row">
					<div class="col s12">
						<div class="col s10">
							<p id="titulo-descuentos">DESCUENTOS</p>
						</div>
						<div class="col s2">
							<img class="right" src="{{asset('images/productos/descuento.png')}}">
						</div>
						<table id="descuentos-table" class="centered">
							<thead>
								<tr>
									<th>
										Desde
									</th>
									<th>
										Hasta
									</th>
									<th>
										% Descuento
									</th>
									<th>
										Monto
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($producto->descuentos as $d)
								<tr data-id="{{ $d->id }}" data-desde="{{ $d->desde->cantidad }}"  data-hasta="{{ $d->hasta->cantidad }}"  data-descuento="{{ $d->descuento }}" >
									<td>{{$d->desde->cantidad}}</td>
									<td>{{$d->hasta->cantidad}}</td>
									<td id="cantidad-td">{{$d->descuento}}%</td>
									<td>
										<span id="monto{{$d->id}}" class="center monto-descuento">$0.00</span>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot >
								<tr style="border-bottom-color: #F9F9F9 !important">
									<td colspan="4">
										<div class="right" style="margin-right: 55px">
											<strong>
												<span id="simbolo-moneda-descuento">Ahorras $</span>
												<span id="descuento_total" class="right">0.00</span>
											</strong>
										</div>
									</td>
								</tr>								
							</tfoot>
						</table>

					</div>
				</div>
				@endif
			</div>	
		</div>
	</div>

	@endsection

	@include('layouts.script')
	<script>

		$(document).ready(function(){  
			$('.materialboxed').materialbox();
			$( ".miniatura-img" ).click(function() {
				var src = $(this).data("srcimage");
				$("#bg-imagen").attr("src", src);
			});
			$('.slider').slider({
				height: 400,
			});



			$('.cantidad-input').on("change",function () {

				/*Cálculo del descuento*/

				var descuento_total = 0;
				$('#descuentos-table tbody tr').each(function(){
					var desde     = $(this).data('desde') || 0;
					var hasta     = $(this).data('hasta') || 0;
					var descuento = $(this).data('descuento') || 0;
					var id        = $(this).data('id');

					$('.cantidad-input').each(function(){
						var presentacion = parseFloat($(this).data('presentacion'));
						var precio       = parseFloat($(this).data('precio')) || 0;
						var cantidad     = parseFloat($(this).val()) || 0;

						if(presentacion >= desde && presentacion <= hasta){
							monto = 0;
							monto = precio * cantidad-((precio * cantidad)*descuento)/100;
							$('#monto'+id).text('$'+monto);
							$('#monto'+id).data('monto', monto);
						}

					});

					var descuento   = $('#monto'+id).data('monto');
					descuento_total += descuento;
					$('#descuento_total').text(descuento_total);

				});

				var total    = 0;

				/*Cálculo del total*/

				$('.cantidad-input').each(function(){
					precio       = parseFloat($(this).data('precio')) || 0;
					cantidad     = parseFloat($(this).val()) || 0;
					presentacion = parseFloat($(this).data('presentacion'));
					total        = total + (precio*cantidad*presentacion);
				});

				$('#total').text(total-descuento_total);


			});

		});

	</script>

</body>
</html>




