<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('categorias')->insert(array (
	  		0 =>
	  		array (
					'id'     => 1,
					'nombre' => '¿Cómo comprar?',
					'orden'  => 'aa',
	  		),
	  		1 =>
	  		array (
					'id'     => 2,
					'nombre' => 'Formas de Pago',
					'orden'  => 'bb',
	  		),
	  		2 =>
			array (
					'id'     => 3,
					'nombre' => 'Envíos',
					'orden'  => 'cc',
	  		),
	  		3 =>
	  		array (
					'id'     => 4,
					'nombre' => 'Información General',
					'orden'  => 'dd',
	  		),
	  	));
    }
}
