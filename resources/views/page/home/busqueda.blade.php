@extends('app')

@section('content')


@include('page.partials.header-secciones')

		<div class="container">
			
			<div class="row" style="margin-top: 5%">
				@if($resultado->count()>0)
					@foreach($resultado as $p)
						<div class="col s12 m12 l4">
							<div class="card z-depth-0" id="subfamilia">
								<div class="subfamilia-productos">
							        <div class="efecto  hide-on-med-and-down">
										<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}"><img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%; margin-left: 3%">	    </a>                
									</div>
									<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}"><img src="{{ asset('images/productos/'.$p->file_image) }}"></a>
								</div>
								<div class="card-content" id="image-subfamilias-card-content" style="height: 50px;" >
									<span class="card-title center" id="image-subfamilias-card-content-title">{{ $p->nombre }}</span>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<div class="col s12 center " >
						<div class="center" style="margin: 5%">
							<p><i class="fas fa-battery-empty" style="font-size: 50px; color: #646464"></i></p>
							<p>
								No se encontraron resultados. 
							</p>
							<a href="{{action('SeccionHomeController@index')}}" class="waves-effect waves-light btn z-depth-0 " id="estandar-btn">VOLVER</a>
						</div>
					</div>
				@endif
			</div>
			
		</div>


	</div>

	
	@endsection


	@include('layouts.script')
</body>
</html>



