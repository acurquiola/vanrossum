
	<ul id="slide-out" class="sidenav sidenav-fixed">
		<div class="logo-admin">
			<img class="responsive-img" src='{{ asset("images/logos/".$logos->file_image) }}' alt="">
		</div>

		<div class="divider"></div>

			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/home/*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">home</i>Home</a>
						<div class="collapsible-body" {{ (\Request::is('adm/home/*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('HomeController@index') }}"><i class="material-icons">navigate_next</i>Información</a></li>
{{-- 								<li><a href=""><i class="material-icons">navigate_next</i>Ver Descuentos</a></li>
								<li><a href=""><i class="material-icons">navigate_next</i>Ver Productos</a></li> --}}
								<li><a href="{{ action('SliderController@create', ['seccion' => 'home']) }}"><i class="material-icons">navigate_next</i>Crear Sliders</a></li>
								<li><a href="{{ action('SliderController@index', ['seccion' => 'home']) }}"><i class="material-icons">navigate_next</i>Ver Sliders</a></li>
							</ul>							
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/productos*'))?"seccion-activa":"" }}" tabindex="0" ><i class="material-icons">shopping_cart</i>Productos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/productos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('ProductoController@create') }}" ><i class="material-icons">navigate_next</i>Crear Producto</a></li>
								<li><a href="{{ action('ProductoController@index') }}" ><i class="material-icons">navigate_next</i>Ver Productos</a></li>
								<li><a href="{{ action('FamiliaController@create') }}" ><i class="material-icons">navigate_next</i>Crear Categorías</a></li>
								<li><a href="{{ action('FamiliaController@index') }}" ><i class="material-icons">navigate_next</i>Ver Categorías</a></li>
								<li><a href="{{ action('UnidadController@index') }}" ><i class="material-icons">navigate_next</i>Ver Unidades de Medición</a></li>
							</ul>
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/cuentas*'))?"seccion-activa":"" }}" tabindex="0" ><i class="fas fa-clipboard-list"></i>Cuentas Bancarias</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/cuentas*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('CuentaController@index') }}" ><i class="material-icons">navigate_next</i>Ver Cuenta</a></li>
							</ul>
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/general*'))?"seccion-activa":"" }}" tabindex="0" ><i class="fas fa-clipboard-list"></i>Códigos Postales</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/general*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('CodPostalController@edit') }}" ><i class="material-icons">navigate_next</i>Cargar Archivo</a></li>
							</ul>
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/preguntas*'))?"seccion-activa":"" }}" tabindex="0" ><i class="fas fa-question-circle"></i>Preguntas Frecuentes</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/preguntas*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('CategoriaController@create') }}"><i class="material-icons">navigate_next</i>Crear Categoría</a></li>
								<li><a href="{{ action('CategoriaController@index') }}" ><i class="material-icons">navigate_next</i>Ver Categoría</a></li>
								<li><a href="{{ action('PreguntaController@create') }}" ><i class="material-icons">navigate_next</i>Crear Preguntas</a></li>
								<li><a href="{{ action('PreguntaController@index') }}" ><i class="material-icons">navigate_next</i>Ver Preguntas</a></li>
							</ul>
						</div>
					</li>
				</ul>
			 	<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/novedades*'))?"seccion-activa":"" }}" tabindex="0" ><i class="material-icons">new_releases</i>Novedades</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/novedades*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('ClasificacionController@create') }}"><i class="material-icons">navigate_next</i>Crear Categoría</a></li>
								<li><a href="{{ action('ClasificacionController@index') }}" ><i class="material-icons">navigate_next</i>Ver Categorías</a></li>
								<li><a href="{{ action('NovedadController@create') }}" ><i class="material-icons">navigate_next</i>Crear Novedad</a></li>
								<li><a href="{{ action('NovedadController@index') }}" ><i class="material-icons">navigate_next</i>Ver Novedades</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/empresa*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">business</i>Quiénes Somos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/empresa*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('EmpresaController@index') }}"><i class="material-icons">navigate_next</i>Datos de la Empresa</a></li>
								<li><a href="{{ action('SliderController@create', ['seccion' => 'empresa']) }}"><i class="material-icons">navigate_next</i>Crear Sliders</a></li>
								<li><a href="{{ action('SliderController@index', ['seccion' => 'empresa']) }}"><i class="material-icons">navigate_next</i>Ver Sliders</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/datos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">phone</i>Contacto</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/datos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('DatoController@contacto') }}"><i class="material-icons">navigate_next</i>Datos de Contacto</a></li>
								<li><a href="{{ action('DatoController@redes') }}"><i class="material-icons">navigate_next</i>Datos de RRSS</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/logos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="fab fa-delicious"></i>Logos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/logos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('LogoController@index') }}"><i class="material-icons">navigate_next</i>Ver Logos</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/metadatos*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">data_usage</i>Metadatos</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/metadatos*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href=" {{action('MetadatoController@index')}} "><i class="material-icons">navigate_next</i>Ver Metadatos</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/clientes/*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">people</i>Clientes</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/clientes/*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href=""><i class="material-icons">navigate_next</i>Ver Clientes</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-grey {{ (\Request::is('adm/usuarios/*'))?"seccion-activa":"" }}" tabindex="0"  ><i class="material-icons">people</i>Usuarios</a>
						<div class="collapsible-body"  {{ (\Request::is('adm/usuarios/*'))?"style=display:block;":"" }}>
							<ul>
								<li><a href="{{ action('UserController@create') }}"><i class="material-icons">navigate_next</i>Crear Usuario</a></li>
								<li><a href="{{ action('UserController@index') }}"><i class="material-icons">navigate_next</i>Editar Usuarios</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</div>
	</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
