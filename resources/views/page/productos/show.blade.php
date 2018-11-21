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
											<td>{{$d->descuento}}</td>
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

		$(document).ready(function(){  
			$('.materialboxed').materialbox();
			$( ".miniatura-img" ).click(function() {
				var src = $(this).data("srcimage");
				$("#bg-imagen").attr("src", src);
			});
			$('.slider').slider({
				height: 400,
			});
		});


	</script>
</body>
</html>

