@extends('app')

@section('content')


<body>

	@include('page.partials.slider')

	
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


