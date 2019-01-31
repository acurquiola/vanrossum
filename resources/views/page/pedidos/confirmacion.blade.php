@extends('app')

@section('content')


<body>

	@if(Session::get('medio_pago')  == 'mercado_pago' )
		<div class="container" style="padding: 50px;">
			<div class="center">		
				<span>Orden generada exitósamente.</span>

				<div class="col s12 l6" >
					<a id="estandar-btn"  href={{ Session::get('confirmacion_url') }} class="btn center-align">PROCESAR PAGO</a>	
					
				</div>
			</div>
		</div>
	@else
		<div class="container" style="padding: 50px;">
			<div class="center">		
				<span>Orden registrada exitósamente.</span>

				<div class="col s12 l6" >
					<a id="estandar-btn" href="{{ action('SeccionProductoController@index') }}" class="btn center-align">VOLVER</a>	
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


