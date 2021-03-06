<div container="" id="header">
	<header>
		<div class="container-fluid top hide-on-med-and-down">
			<div class="list-top row">
				<div>
					<a href=""><i style="color: #FFF; font-size: 25px; margin-top: 5px" class="fab fa-facebook"></i></a>
				</div>
				<div class="col s3 right centrado hide-on-med-and-down" style="justify-content: space-between;">

					{!! Form::open(['action'=> 'SeccionHomeController@buscador', 'method' => 'get', 'class' => 'buscador']) !!}

					<div class="li-busqueda">
						<button type="submit" name="submit" style="padding-bottom: 0px; padding-right: 0px; border-top-width: 0px;padding-left: 0px;background-color: #F8A900;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: white; background-color: transparent!important;">search</i></button>   
						<input id="buscador" type="search" name="busqueda" placeholder="Estoy buscando..." autocomplete="off" style="margin-left: 5px; border-bottom: 1px solid transparent;margin-top: 15px">
						
						@auth()
							<a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i style="color: #FFF; font-size: 25px; margin-top: 5px" class="fas fa-sign-out-alt"></i>
							</a>
						@endauth

					</div>
					{!! Form::close() !!}

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>

		<nav class="principal z-depth-0" style="border: 1px solid #ECECEC;">
			<div>
				<ul class="item-left left hide-on-med-and-down" sy>
					<li><a href=" {{ url('/productos/familias')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }} >PRODUCTOS</a></li>
					<li><a href="{{ url('/productos/familias')}}" {{ (\Request::is('destacados*'))?"id=seccion-active":"" }} >DESTACADOS</a></li>					
					<li><a href=" {{ url('/novedades')}} " {{ (\Request::is('novedades*'))?"id=seccion-active":"" }}>NOVEDADES</a></li>
				</ul>
				<a class="brand-logo center" href="{{ url('/') }}">
					<img alt="" src="{{asset('images/logos/'.$logos->file_image)}}"></img>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color: #3E3F41">menu</i></a>
				</a>
				<ul class="item-right right hide-on-med-and-down">
					<li><a href="{{ url('/empresa') }}" {{ (\Request::is('empresa*'))?"id=seccion-active":"" }} >QUIÉNES SOMOS</a></li>
					<li><a href="{{ url('contacto') }}" {{ (\Request::is('contacto*'))?"id=seccion-active":"" }} >CONTACTO</a></li>
					<li><a href="{{ url('carrito') }}" {{ (\Request::is('carrito*'))?"id=seccion-active":"" }} ><i style="font-size: 17px" class="fas fa-shopping-cart"></i><span style="padding-left: 10px">CARRITO </span></a></li>
				</ul>
				
			</div>
		</nav>

		<ul class="sidenav" id="mobile-demo">
			<li><a href=" {{ route('home') }} " {{ (\Request::is('/'))?"id=seccion-active":"" }}>INICIO</a></li>
			<li><a href=" {{ url('/productos/familias')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
			<li><a href="#" {{ (\Request::is('destacados*'))?"id=seccion-active":"" }}>DESTACADOS</a></li>
			<li><a href="{{ url('novedades') }}" {{ (\Request::is('novedades*'))?"id=seccion-active":"" }}>NOVEDADES</a></li>
			<li><a href="{{ url('empresa') }}" {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>QUIÉNES SOMOS</a></li>      
			<li><a href="{{ url('contacto') }}" {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>CONTACTO</a></li>     
			<li><a href="{{ url('carrito') }}" {{ (\Request::is('carrito*'))?"id=seccion-active":"" }}>CARRITO</a></li>     
		</ul>
	</header>
</div>