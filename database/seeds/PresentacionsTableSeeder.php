<?php

use Illuminate\Database\Seeder;

class PresentacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('presentacions')->insert(array (
	  		0 =>
	  		array (
					'id'          => 1,
					'cantidad'    => '0.9',
					'precio'      => '2.5',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		1 =>
	  		array (
					'id'          => 2,
					'cantidad'    => '4.5',
					'ubicacion'   => '8.11',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		2 =>
			array (
					'id'          => 3,
					'cantidad'    => '18',
					'ubicacion'   => '10',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		3 =>
	  		array (
					'id'          => 4,
					'cantidad'    => '24',
					'producto_id' => 1,
					'ubicacion'   => '800',
					'unidad_id'   => 1,
	  		),
	  	));
    }
}
