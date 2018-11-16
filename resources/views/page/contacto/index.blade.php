@extends('app')

@section('content')


<body>
	


	<!-- Mapa  -->



		{!! $mapa->descripcion !!}



	<!-- Formulario  -->



		@include('page.contacto.partials.form')

	@endsection

	@include('layouts.script')
</body>
</html>


