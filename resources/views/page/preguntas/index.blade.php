@extends('app')

@section('content')


	<body>
		<div class="container">
			<div class="row">
				<ul class="collapsible z-depth-0"  style="border: 0 !important">
				@foreach($categorias as $c)
					<li>
						<div class="collapsible-header header-categorias" >{{ mb_strtoupper($c->nombre) }}</div>
						@forelse($c->preguntas as $p)
							<div class="collapsible-body valign-wrapper header-preguntas">
								<span>{{ mb_strtoupper($p->pregunta) }}</span>
								<p>{{ $p->respuesta }}</p>
							</div>
						@empty
							<div class="collapsible-body valign-wrapper">
								<span>No disponemos preguntas para esta categoría</span>
							</div>
						@endforelse
					</li>
				@endforeach
				</ul>
			</div>	
		</div>
		@endsection
		@include('layouts.script')
	</body>
</html>


