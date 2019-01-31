@extends('app')

@section('content')


<body>

		<div class="container" style="padding: 50px;">
			<div class="center">		
				<span>Pago realizado exitósamente.</span>

				<div class="col s12 l6" >
					<a id="estandar-btn" href="{{ action('SeccionProductoController@index') }}" class="btn center-align">VOLVER</a>	
				</div>
			</div>
		</div>


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


