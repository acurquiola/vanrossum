@extends('app')

@section('content')


<body>

	@include('page.partials.slider')




	@if($informacion->count() > 0)
		<div class="row informacion-div">
			<p id="informacion-titulo">{{ $textos->home_titulo }}</p>
			<p id="informacion-subtitulo">{{ $textos->home_subtitulo }}</p>
			<div class="container" style="margin-top: 3%; margin-right: 15%">
				<div class="row">
					@foreach($informacion as $i)
						<div class="col s12 m6 l3 center">
							<img src="{{ asset('images/home/'.$i->file_image) }}">
							<p class="nombre-globos">{{ $i->nombre }}</p>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif


@endsection

@include('layouts.script')

<script>
	$(document).ready(function(){  
		$('#slider-home').slider({
			height: 479,
		})
	});

</script>
</body>
</html>


