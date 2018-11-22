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
									<td class="right"><input type="number" class="cantidad-input" data-precio="{{ $p->precio }}" min="0" style="width: 50px" name="cantidad[]" value="0"></td>
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
								<tr >										
									<td colspan="3"><p id="titulo-iva" class="right">Precio Final IVA incluido</p></td>
								</tr>									
							</tfoot>
						</table>

					</div>
				</div>

				@endif

				@if($producto->descuentos->count() > 0)

				<div class="row" id="descuentos-row">
					<div class="col s12">
						<p id="titulo-descuentos">DESCUENTOS</p>
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
										Precio
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($producto->descuentos as $d)
								<tr>
									<td>{{$d->desde->cantidad}}</td>
									<td>{{$d->hasta->cantidad}}</td>
									<td id="cantidad-td">{{$d->descuento}}%</td>
									<td></td>
								</tr>
								@endforeach
							</tbody>
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

		function suma(a,b){
			resultado = a+b;
			return resultado;
		}

		$(document).ready(function(){  
			$('.materialboxed').materialbox();
			$( ".miniatura-img" ).click(function() {
				var src = $(this).data("srcimage");
				$("#bg-imagen").attr("src", src);
			});
			$('.slider').slider({
				height: 400,
			});

			/*Cálculo del total*/

			/*$(".cantidad-input").change(function() {
				var cantidad = parseInt($(this).val(), 10) || 0;
				var precio   = parseFloat($(this).data('precio')) || 0;
				
				var monto    = parseInt($( ".monto-input" ).val());
				
				var aux      = cantidad*precio;


				var total    = suma(monto,aux);
				
				$( ".monto-input" ).val(total);


			});*/



			$('.cantidad-input').on("change",function () {
				var total    = 0;

				$('.cantidad-input').each(function(){
					precio       = parseFloat($(this).data('precio')) || 0;
					cantidad     = parseFloat($(this).val()) || 0;
					total        = total + precio*cantidad;
				});

				
				$('#total').text(total);
			});
		});

	</script>

</body>
</html>




