<?php

use Illuminate\Database\Seeder;

class MetadatosTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('metadatos')->insert(array (
  			0 =>
  			array (
  				'id'          => 1,
  				'seccion'     => 'Home',
  				'keyword'     => 'home',
  				'url'         => '/',
  				'descripcion' => 'Página principal',
  			),
  			1 =>
  			array (
  				'id'          => 2,
  				'seccion'     => 'Quiénes Somos',
  				'keyword'     => 'empresa',
  				'url'         => '/empresa',
  				'descripcion' => 'Descripción de la empresa',
  			),
  			2 =>
  			array (
  				'id'          => 3,
  				'seccion'     => 'Productos',
  				'keyword'     => 'productos',
  				'url'         => '/productos',
  				'descripcion' => 'Catálogo de Productos',
  			),
  			3 =>
  			array (
  				'id'          => 4,
  				'seccion'     => 'Novedades',
  				'keyword'     => 'novedades',
  				'url'         => '/novedades',
  				'descripcion' => 'Publicación de las novedades que brinda la empresa.',
  			),
  			4 =>
  			array (
  				'id'          => 5,
  				'seccion'     => 'Destacados',
  				'keyword'     => 'productos destacados',
  				'url'         => '/destacados',
  				'descripcion' => 'Sección de productos destacados.',
  			),
  			5 =>
  			array (
  				'id'          => 6,
  				'seccion'     => 'Carrito',
  				'keyword'     => 'carrito',
  				'url'         => '/carrito',
  				'descripcion' => 'Carrito de Compras',
  			),
  			6 =>
  			array (
  				'id'          => 7,
  				'seccion'     => 'Contacto',
  				'keyword'     => 'contacto',
  				'url'         => '/contacto',
  				'descripcion' => 'Zona de contacto',
  			),
  		));
    }
}
