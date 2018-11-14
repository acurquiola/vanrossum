@extends('app')

@section('content')


<body>


	@include('page.partials.slider')

	<div class="container">
		<div class="row">
			<div class="col s12  m12 l4">
				<img src="{{ asset('images/empresa/'.$empresa->file_image) }}" class="responsive-img">
			</div>
			<div class="col s12  m12 l8 " id="descripcion-empresa">
				<div class="card card-empresa z-depth-0">
					<div class="card-content">
						<span class="card-title title-empresa">MISIÓN</span>
						<p class="content-empresa">{{ $empresa->mision }}</p>
					</div>
				</div>
				<div class="card card-empresa z-depth-0">
					<div class="card-content">
						<span class="card-title title-empresa">VISIÓN</span>
						<p class="content-empresa">{{ $empresa->vision }}</p>
					</div>
				</div>
				<div class="card card-empresa z-depth-0">
					<div class="card-content">
						<span class="card-title title-empresa">VALORES</span>
						<p class="content-empresa">{{ $empresa->valores }}</p>
					</div>
				</div>
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


