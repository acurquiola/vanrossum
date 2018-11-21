@extends('app')

@section('content')


<body>


	<div class="container" style="width: 85%">

		@include('page.partials.header-secciones')

		<div class="row" id="familias-row">
			
			@include('page.productos.partials.menu')

			@if($items->count() > 0 || $productos->count() > 0)
				<div class="col s12 m12 l9 center">
					@forelse($items as $i)
						<div class="col s12 m12 l4">
							<div class="familia-productos center">
						        <div class="efecto">
									<a href="{{ action('SeccionProductoController@listar', ['id' => $i->id, 'padre' => $familia_padre->id]) }}">
										<img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%">
									</a>  
								</div>
								<img class="familia-img" src="{{ asset('images/familias/'.$i->file_image) }}">
							</div>
							<p class="producto-nombre">{{ $i->nombre }}</p>
						</div>
					@empty
					@endforelse
					@forelse($productos as $i)
						<div class="col s12 m12 l4">
							<div class="familia-productos">
						        <div class="efecto">
									<a href="{{ action('SeccionProductoController@show', ['id' => $i->id, 'padre' => $familia_padre->id]) }}">
										<img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%">
									</a>  
								</div>
								<img class="familia-img" src="{{ asset('images/productos/'.$i->file_image) }}">
							</div>
							<p class="producto-nombre">{{ $i->nombre }}</p>
						</div>
					@empty
					@endforelse
				</div>
			@endif	
		
			@if($productos->count() == 0 && $items->count() == 0)
				<div class="col s12 m12 l9 center">
					<h5>No conseguimos registros para esta selección</h5>
				</div>	
			@endif
		</div>
	</div>

	@endsection

	@include('layouts.script')
</body>
</html>

