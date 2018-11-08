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

Route::get('/', function () {
	return view('welcome');
});

//Rutas para la gestión de clientes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('adm')->group(function () {

	//Rutas para la gestión de usuarios administrativos
	Route::get('home', 'AdminController@index')->name('admin.dashboard');
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::get('register', 'AdminController@create')->name('admin.register');
	Route::post('register', 'AdminController@store')->name('admin.register.store');
	Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

	//Ruta para la gestión de logos
	Route::resource('logos', 'LogoController');

	//Ruta para la gestión de metadatos
	Route::resource('metadatos', 'MetadatoController');

	//Ruta para la gestión de empresa
	Route::resource('empresa', 'EmpresaController');

	//Ruta para la gestión de sliders
	Route::get('slider/{seccion}', 'SliderController@index');
	Route::get('slider/crear/{seccion}', 'SliderController@create');
	Route::post('slider/{seccion}/{id}', 'SliderController@store');
	Route::get('slider/edit/{seccion}/{id}', 'SliderController@edit');
	Route::put('slider/update/{seccion}/{id}', 'SliderController@update');
	Route::get('slider/delete/{id}', 'SliderController@eliminar');

	//Ruta para la gestión de contacto y redes
	Route::prefix('datos')->group(function () {
		Route::get('contacto', 'DatoController@contacto');
		Route::get('contacto/edit/{id}', 'DatoController@editContacto');
		Route::get('redes', 'DatoController@redes');
		Route::get('redes/edit/{id}', 'DatoController@editRedes');
		Route::put('update/{id}', 'DatoController@update');
	});

	//Ruta para la gestión de usuarios 
	Route::prefix('usuarios/')->group(function () {
		Route::resource('user', 'UserController')->except(['show']);
		Route::get('delete/{id}', 'UserController@eliminar');
	});


	//Ruta para la gestión de usuarios 
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
		});
	});
});

