
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('js/velocity.min.js')}}"></script>

<script>

	$(document).ready(function(){  
    	$('.collapsible').collapsible();
    	$('.sidenav').sidenav();
		$('.dropdown-trigger').dropdown({
			constrainWidth: false,
			closeOnClick: false,
			hover: true
		});
		$('.dropdown-buscador').dropdown({
			constrainWidth: false,
			closeOnClick: false,
		});


	});

</script>
