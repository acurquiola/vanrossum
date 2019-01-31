@extends('app')

@section('content')


<body>

		<div class="container" style="padding: 50px;">
			<div class="center">		
				<span>El pago no pudo ser procesado, inténtelo nuevamente.</span>

				<div class="col s12 l6" >
					<a id="estandar-btn"  href={{ Session::get('confirmacion_url') }} class="btn center-align">PROCESAR PAGO</a>	
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


