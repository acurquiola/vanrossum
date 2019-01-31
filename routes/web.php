<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'SeccionHomeController@index')->name('home');
Route::get('/search', 'SeccionHomeController@buscador');

//Rutas de secciones

//Sección de Empresa
Route::get('/empresa', 'SeccionEmpresaController@index');
//Sección de Novedades
Route::get('/novedades', 'SeccionNovedadesController@index');
Route::get('/novedades/filtros/{id}', 'SeccionNovedadesController@filter')->name('filtros');
Route::get('/novedades/ver/{id}', 'SeccionNovedadesController@ver')->name('ver');
//Sección de Contacto
Route::resource('/contacto', 'SeccionContactoController');
//Sección de Preguntas
Route::get('preguntas', 'SeccionPreguntasController@index');
//Sección de Productos 
Route::prefix('productos')->group(function () {
	Route::get('familias', 'SeccionProductoController@index');
	Route::get('listar/{id}/{padre}', 'SeccionProductoController@listar');
	Route::get('show/{id}/{padre}', 'SeccionProductoController@show');
});


//Sección de Productos 
Route::get('carrito', 'SeccionPedidoController@index');
Route::post('carrito/agregar-carrito', 'SeccionPedidoController@store');
Route::get('carrito/consultar-monto', 'SeccionPedidoController@consultarMontoEnvio');
Route::post('carrito/confirmar', 'SeccionPedidoController@confirmar');
Route::post('carrito/remove', 'SeccionPedidoController@remove');

Route::get('/dolar', 'ValorDolarController@index');

//Rutas para la gestión de clientes
Auth::routes();

Route::prefix('adm')->group(function () {

	// Admin Home
	Route::prefix('home')->group(function () {
		
		// Admin Ofertas Destacadas
			Route::resource('destacados', 'DestacadoController');

		// Admin Productos Destacados
			Route::resource('productos', 'DestacadoController');

		//Información principal de la empresa
			Route::get('/informacion/ver', 'HomeController@index');
			Route::get('/informacion/{id}', 'HomeController@edit');
			Route::put('/informacion/{id}', 'HomeController@update');

			Route::get('/informacion/texto/{id}', 'HomeController@editTexto');
			Route::put('/informacion/texto/{id}', 'HomeController@updateTexto');

		//Sliders del Home
			Route::get('/sliders', 'HomeController@indexSlider');
			Route::get('/sliders/create', 'HomeController@createSlider');
			Route::post('/sliders', 'HomeController@storeSlider');
			Route::get('/sliders/{id}', 'HomeController@editSlider');
			Route::put('/sliders/{id}', 'HomeController@updateSlider');	
			Route::get('/sliders/eliminar/{id}', 'HomeController@eliminar');

	});


	//Rutas para la gestión de usuarios administrativos
	Route::get('home', 'AdminController@index')->name('admin.dashboard');
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::get('register', 'AdminController@create')->name('admin.register');
	Route::post('register', 'AdminController@store')->name('admin.register.store');
	Route::get('/', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

	//Ruta para la gestión de logos
	Route::resource('logos', 'LogoController');

	//Ruta para la gestión de metadatos
	Route::resource('metadatos', 'MetadatoController');


	//Ruta para la gestión de metadatos
	Route::resource('cuentas', 'CuentaController');

	//Ruta para la gestión de usuarios 
	Route::prefix('empresa/')->group(function () {
		Route::resource('index', 'EmpresaController');
	});

	//Ruta para la gestión de sliders
	Route::get('{seccion}/slider/', 'SliderController@index');
	Route::get('{seccion}/slider/crear/', 'SliderController@create');
	Route::post('{seccion}/slider', 'SliderController@store');
	Route::get('{seccion}/slider/edit/{id}', 'SliderController@edit');
	Route::put('{seccion}/slider/update/{id}', 'SliderController@update');
	Route::get('slider/delete/{id}', 'SliderController@eliminar');

	//Ruta para la gestión de contacto y redes
	Route::prefix('datos')->group(function () {
		Route::get('contacto', 'DatoController@contacto');
		Route::get('contacto/edit/{id}', 'DatoController@editContacto');
		Route::get('redes', 'DatoController@redes');
		Route::get('redes/edit/{id}', 'DatoController@editRedes');
		Route::put('update/{id}', 'DatoController@update');
	});

	//Ruta para la gestión de Preguntas Frecuentes 
	Route::prefix('preguntas/')->group(function () {
		Route::resource('categorias', 'CategoriaController')->except(['show']);
		Route::get('/categorias/delete/{id}', 'CategoriaController@eliminar');

		Route::resource('pregunta', 'PreguntaController')->except(['show']);
		Route::get('delete/{id}', 'PreguntaController@eliminar');
	});


	//Ruta para la gestión de novedades
	Route::prefix('novedades/')->group(function () {
		Route::resource('index', 'NovedadController')->except(['show']);
		Route::get('delete/{id}', 'NovedadController@eliminar');
			
		//Categorias de Novedades
			Route::resource('/categorias', 'ClasificacionController');
			Route::get('/categorias/delete/{id}', 'ClasificacionController@eliminar');
	});


	//Ruta para la gestión de usuarios 
	Route::prefix('usuarios/')->group(function () {
		Route::resource('user', 'UserController')->except(['show']);
		Route::get('delete/{id}', 'UserController@eliminar');
	});

	Route::prefix('general/')->group(function () {
		Route::get('edit', 'CodPostalController@edit');
		Route::put('update/{id}', 'CodPostalController@update');
		Route::post('importExcel', 'CodPostalController@importExcel');
	});

	//Ruta para la gestión de productos 
	Route::prefix('productos')->group(function () {
		Route::resource('familias', 'FamiliaController');
		Route::get('familias/delete/{id}', 'FamiliaController@eliminar');

		Route::prefix('subfamilias/')->group(function () {
			Route::get('index/{id}', 'SubfamiliaController@index');
			Route::get('create/{id}', 'SubfamiliaController@create');
			Route::post('create/{id}', 'SubfamiliaController@store');
			Route::get('subfamilias/delete/{id}', 'SubfamiliaController@eliminar');
		});

		Route::prefix('/')->group(function () {
			Route::resource('producto', 'ProductoController')->except(['show']);
			Route::get('producto/delete/{id}', 'ProductoController@eliminar');	
			Route::get('/select/subfamilias', 'ProductoController@subfamilias');

		});

		Route::prefix('presentaciones')->group(function () {
			Route::get('/{id}', 'PresentacionController@index');
			Route::get('/create/{id}', 'PresentacionController@create');
			Route::post('/create/{id}', 'PresentacionController@store');
			Route::get('/edit/{id}', 'PresentacionController@edit');
			Route::put('/update/{id}', 'PresentacionController@update');
			Route::get('presentacion/delete/{id}', 'PresentacionController@eliminar');	
			Route::get('delete/{id}', 'PresentacionController@eliminar');
		});


		Route::prefix('descuentos')->group(function () {
			Route::get('/{id}', 'DescuentoController@index');
			Route::get('/create/{id}', 'DescuentoController@create');
			Route::post('/create/{id}', 'DescuentoController@store');
			Route::get('/edit/{id}', 'DescuentoController@edit');
			Route::put('/update/{id}', 'DescuentoController@update');
			Route::get('descuento/delete/{id}', 'DescuentoController@eliminar');	
			Route::get('delete/{id}', 'DescuentoController@eliminar');
		});

		Route::prefix('unidades/')->group(function () {
			Route::resource('unidad', 'UnidadController')->except(['show']);
			Route::get('delete/{id}', 'UnidadController@eliminar');
		});

		Route::prefix('galerias/')->group(function () {
			Route::get('index/{id}', 'GaleriaController@index');
			Route::get('create/{id}', 'GaleriaController@create');
			Route::post('store', 'GaleriaController@store');
			Route::get('edit/{id}', 'GaleriaController@edit');
			Route::put('update/{id}', 'GaleriaController@update');
			Route::get('delete/{id}', 'GaleriaController@eliminar');
		});

	});
});

