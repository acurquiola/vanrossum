@extends('app')

@section('content')


<body>


	<div class="container">

		@include('page.partials.header-secciones')

		<div class="row" id="familias-row">
			
			@forelse($familias as $f)
				<div class="col s12 m12 l4 center">
					<div class="familia-productos">
				        <div class="efecto">
							<a href="{{ action('SeccionProductoController@listar', ['id' => $f->id, 'padre' => $f->id]) }}"><img src="{{ asset('images/familias/hover-familias.png') }}" class="responsive-img" style="width: 100%">	    </a>                
						</div>
						<img class="familia-img" src="{{ asset('images/familias/'.$f->file_image) }}">
					</div>
					<p class="producto-nombre">{{ $f->nombre }}</p>
				</div>	
			@empty
			@endforelse
		</div>
	</div>

	@endsection

	@include('layouts.script')
</body>
</html>

